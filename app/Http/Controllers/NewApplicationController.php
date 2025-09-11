<?php

namespace App\Http\Controllers;

use App\Events\NewApplicationStatusChanged;
use App\Http\Requests\NewApplication\AlternateRequest;
use App\Http\Requests\NewApplication\DemographicRequest;
use App\Http\Requests\NewApplication\IncomeRequest;
use App\Http\Requests\NewApplication\InsuranceRequest;
use App\Http\Requests\NewApplication\ProofsRequest;
use App\Http\Requests\NewApplication\ReviewRequest;
use App\Http\Requests\NewApplication\SignatureRequest;
use App\Models\ApplicationEthnicity;
use App\Models\ApplicationGender;
use App\Models\ApplicationLanguage;
use App\Models\ApplicationMaritalStatus;
use App\Models\ApplicationRace;
use App\Models\ApplicationStatus;
use App\Models\ApplicationStatusHistory;
use App\Models\Ethnicity;
use App\Models\Gender;
use App\Models\Language;
use App\Models\LivingArrangement;
use App\Models\Lookups\ApplicationStatusesLookup;
use App\Models\Lookups\ApplicationTypesLookup;
use App\Models\Lookups\FileTypesLookup;
use App\Models\MaritalStatus;
use App\Models\Medicare;
use App\Models\MergedApplication;
use App\Models\NewApplication;
use App\Models\Race;
use App\Models\Views\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NewApplicationController extends Controller
{
    public function initiate()
    {
        Gate::authorize('create', NewApplication::class);

        $newApplication = NewApplication::create([
            'application_type_id' => ApplicationTypesLookup::NEWAPPLICATION,
            'applicant_id' => Auth::user()->getApplicantId(),
            'first_name' => Auth::user()->first_name,
            'middle_name' => Auth::user()->middle_name,
            'last_name' => Auth::user()->last_name,
            'alias' => Auth::user()->alias,
            'date_of_birth' => Auth::user()->date_of_birth,
            'ssn' => Auth::user()->ssn,
            'email' => Auth::user()->email,

        ]);

        ApplicationStatusHistory::create([
            'application_id' => $newApplication->id,
            'application_status_id' => ApplicationStatusesLookup::INPROGRESS,
            'application_type_id' => $newApplication->application_type_id,
        ]);

        return redirect()->route('newapplication.demographic', $newApplication);
    }

    public function demographic(NewApplication $newApplication)
    {
        $genders = Gender::all()->pluck('name', 'id');
        $races = Race::all()->pluck('name', 'id');
        $ethnicities = Ethnicity::all()->pluck('name', 'id');
        $languages = Language::all()->pluck('name', 'id');
        $marital_statuses = MaritalStatus::all()->pluck('name', 'id');
        $livingArrangements = LivingArrangement::all();

        return view('newapplication.demographics', compact('genders', 'races', 'ethnicities', 'languages', 'marital_statuses', 'livingArrangements', 'newApplication'));
    }

    public function savedemographic(DemographicRequest $request)
    {
        $app = NewApplication::findOrFail($request->id);
        $input = $request->all();
        if ($request->date_of_birth != null) {
            $input['date_of_birth'] = Carbon::parse($request->date_of_birth);
        }
        $app->update($input);

        ApplicationGender::where('application_id', $app->id)->where('application_type_id', $app->application_type_id)->delete();
        if ($request->has('genders')) {
            foreach ($request->genders as $gender) {
                ApplicationGender::create([
                    'application_id' => $app->id,
                    'application_type_id' => $app->application_type_id,
                    'gender_id' => $gender,
                ]);
            }
        }
        ApplicationRace::where('application_id', $app->id)->where('application_type_id', $app->application_type_id)->delete();
        if ($request->has('races')) {
            foreach ($request->races as $race) {
                ApplicationRace::create([
                    'application_id' => $app->id,
                    'application_type_id' => $app->application_type_id,
                    'race_id' => $race,
                ]);
            }
        }
        ApplicationEthnicity::where('application_id', $app->id)->where('application_type_id', $app->application_type_id)->delete();
        if ($request->has('ethnicities')) {
            foreach ($request->ethnicities as $ethnicity) {
                ApplicationEthnicity::create([
                    'application_id' => $app->id,
                    'application_type_id' => $app->application_type_id,
                    'ethnicity_id' => $ethnicity,
                ]);
            }
        }
        ApplicationLanguage::where('application_id', $app->id)->where('application_type_id', $app->application_type_id)->delete();
        if ($request->has('languages')) {
            foreach ($request->languages as $language) {
                ApplicationLanguage::create([
                    'application_id' => $app->id,
                    'application_type_id' => $app->application_type_id,
                    'language_id' => $language,
                ]);
            }
        }
        ApplicationMaritalStatus::where('application_id', $app->id)->where('application_type_id', $app->application_type_id)->delete();
        if ($request->has('marital_statuses')) {
            foreach ($request->marital_statuses as $marital_status) {
                ApplicationMaritalStatus::create([
                    'application_id' => $app->id,
                    'application_type_id' => $app->application_type_id,
                    'marital_status_id' => $marital_status,
                ]);
            }
        }

        return redirect()->route('newapplication.contact', $app);
    }

    public function contact(NewApplication $newApplication)
    {
        return view('newapplication.contact', compact('newApplication'));
    }

    public function savecontact(Request $request)
    {
        $app = NewApplication::findOrFail($request->id);
        $hasPhoneNumber = $app->phoneNumbers()->exists();
        $hasAddress = $app->addresses()->exists();

        if ($hasPhoneNumber && $hasAddress) {
            return redirect()->route('newapplication.insurance', $app);
        }

        return redirect()->route('newapplication.contact', $app)->with('error', 'You must submit at least one phone number and one address to continue to the next section.');
    }

    public function insurance(NewApplication $newApplication)
    {
        $medicares = Medicare::all()->pluck('name', 'id');

        return view('newapplication.insurance', compact('newApplication', 'medicares'));
    }

    public function saveinsurance(InsuranceRequest $request)
    {
        $app = NewApplication::findOrFail($request->id);
        $app->update($request->all());

        return redirect()->route('newapplication.income', $app);
    }

    public function income(NewApplication $newApplication)
    {
        return view('newapplication.income', compact('newApplication'));
    }

    public function saveincome(IncomeRequest $request)
    {
        $app = NewApplication::findOrFail($request->id);

        return redirect()->route('newapplication.alternate', $app);
    }

    public function alternate(NewApplication $newApplication)
    {
        return view('newapplication.alternate', compact('newApplication'));
    }

    public function savealternate(AlternateRequest $request)
    {
        $app = NewApplication::findOrFail($request->id);

        return redirect()->route('newapplication.proofs', $app);
    }

    public function proofs(NewApplication $newApplication)
    {
        $files = $newApplication->files()->get(['id', 'file_name', 'file_type_id', 'created_by_id', 'updated_by_id', 'created_at', 'updated_at']);
        $files->load('type');

        return view('newapplication.proofs', compact('newApplication', 'files'));
    }

    public function saveproofs(ProofsRequest $request)
    {
        $app = NewApplication::findOrFail($request->id);

        $hasProofOfResidency = $app->files()->where('file_type_id', FileTypesLookup::PROOFOFRESIDENCY)->exists();

        if ($hasProofOfResidency) {
            return redirect()->route('newapplication.signature', $app);
        }

        return redirect()->route('newapplication.proofs', $app)->with('error', 'You must submit Proof of Residency to continue to the next section.');
    }

    public function signature(NewApplication $newApplication)
    {
        return view('newapplication.signature', compact('newApplication'));
    }

    public function savesignature(SignatureRequest $request)
    {
        $newApplication = NewApplication::findOrFail($request->id);

        // get last status of application
        $newApplicationWithStatus = Application::where('application_id', $newApplication->id)
            ->where('application_type_id', $newApplication->application_type_id)
            ->first();
        $lastStatus = $newApplicationWithStatus->application_status_id;
        $nextStatus = ApplicationStatusesLookup::SUBMITTED;
        if ($lastStatus == ApplicationStatusesLookup::MODIFICATIONREQUIRED) {
            $nextStatus = ApplicationStatusesLookup::MODIFICATIONSUBMITTED;
        }

        // assign application to reviewer
        $assignedToUser = ApplicationStatusHistory::getAssignedUserForApplication($newApplication->id, $newApplication->application_type_id);

        if ($assignedToUser == null) {
            return view('newapplication.signature', compact('newApplication'))->with('error', 'Unable to find a reviewer to assign the application to.');
        }

        $assignedToUser->last_assignment_date = Carbon::now();
        ApplicationStatusHistory::create([
            'application_id' => $newApplication->id,
            'application_type_id' => $newApplication->application_type_id,
            'application_status_id' => $nextStatus,
            'notes' => $request->notes,
            'assigned_to_user_id' => $assignedToUser->id,
        ]);

        // update user information
        $applicant = $newApplication->applicant;
        $applicant->update($newApplication->only([
            'first_name',
            'middle_name',
            'last_name',
            'alias',
            'email',
            'date_of_birth',
            'ssn',
        ]));

        // update merged application
        $mergedApplication = $applicant->mergedApplication;
        if ($mergedApplication == null) {
            $mergedApplication = MergedApplication::create([
                'applicant_id' => $applicant->id,
                'application_type_id' => $newApplication->application_type_id,
            ]);
        }
        $mergedApplication->fill($newApplication->toArray());
        $mergedApplication->date_of_birth = $newApplication->date_of_birth;
        $mergedApplication->save();

        return redirect()->route('home');
    }

    public function review(NewApplication $newApplication)
    {
        $newApplication->load([
            'applicant',
            'genders',
            'races',
            'ethnicities',
            'languages',
            'maritalStatuses',
            'livingArrangement',
            'alternateContacts',
            'households',
            'files',
            'medicares',
        ]);
        $statusHistories = ApplicationStatusHistory::with('application_status', 'assigned_to', 'created_by', 'updated_by')
            ->where('application_id', $newApplication->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $genders = Gender::all();
        $races = Race::all();
        $ethnicities = Ethnicity::all();
        $languages = Language::all();
        $maritalStatuses = MaritalStatus::all();
        $livingArrangements = LivingArrangement::all();
        $medicares = Medicare::all();
        $currentStatus = $newApplication->status_histories->last()->application_status;
        $availableStatuses = ApplicationStatus::getAvailableNewApplicationStatuses($currentStatus->id)->pluck('name', 'id');

        return view('newapplication.review', compact('genders', 'races', 'ethnicities', 'languages', 'maritalStatuses', 'livingArrangements', 'newApplication', 'medicares', 'currentStatus', 'availableStatuses', 'statusHistories'));
    }

    public function savereview(ReviewRequest $request)
    {
        $newApplication = NewApplication::findOrFail($request->application_id);
        $assignToUser = ApplicationStatusHistory::getAssignedUserForApplication($newApplication->id, $newApplication->application_type_id);

        $status = ApplicationStatusHistory::create([
            'application_id' => $newApplication->id,
            'application_type_id' => $newApplication->application_type_id,
            'application_status_id' => $request->application_status_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'notes' => $request->notes,
            'assigned_to_user_id' => $assignToUser->id,
        ]);

        NewApplicationStatusChanged::dispatch();

        return redirect('newapplication.review', $newApplication)->with('success', 'Application status updated successfully.');
    }
}
