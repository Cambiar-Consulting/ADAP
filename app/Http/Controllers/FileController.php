<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\ApplicationFile;
use App\Models\File;
use App\Models\FileType;
use App\Models\NewApplication;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function create(Request $request)
    {
        if ($request->missing(['application_id', 'application_type_id'])) {
            return back()->with('error', 'Error getting to the file upload page. Please try again.');
        }

        $file_types = FileType::all()->pluck('name', 'id');

        return view('files.create', compact('file_types'));
    }

    public function store(FileRequest $request)
    {
        $newApplication = NewApplication::findOrFail($request->application_id);

        $path = $request->file->store('files');

        $file = File::create([
            'file_name' => $request->file->getClientOriginalName(),
            'path' => $path,
            'file_type_id' => $request->file_type_id,
            'file_size' => $request->file->getSize(),
            'content_type' => $request->file->getClientMimeType(),
        ]);

        ApplicationFile::create([
            'application_id' => $request->application_id,
            'application_type_id' => $request->application_type_id,
            'file_id' => $file->id,
        ]);

        return redirect()->route('newapplication.proofs', $newApplication)->with('success', 'Successfully uploaded file.');
    }

    public function edit(File $file)
    {
        $file_types = FileType::all()->pluck('name', 'id');

        return view('files.create', compact('file', 'file_types'));
    }

    public function update(FileRequest $request, File $file)
    {
        $file->update($request->all());

        return back()->with('success', 'Updated file');
    }

    public function destroy(File $file)
    {
        $app_files = ApplicationFile::where('file_id', $file->id);
        foreach ($app_files as $app_file) {
            $app_file->delete();
        }
        $file->delete();

        return back()->with('success', 'Deleted file.');
    }

    public function download(File $file)
    {
        return response()->download($file->path, $file->file_name, ['Content-Type' => $file->content_type]);
    }

    private function setFileName()
    {
        $applicantId = Auth::user()->getApplicantId();
        $applicant = User::findOrFail($applicantId);
        $filename = $applicant->first_name.'_'.$applicant->last_name.'_'.Carbon::now()->format('Y_m_d_H_i_s');
        $filename = preg_replace("/\s+/", '', $filename);
    }
}
