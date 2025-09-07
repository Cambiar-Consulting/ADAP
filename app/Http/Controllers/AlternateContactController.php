<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlternateContactRequest;
use App\Models\AlternateContact;
use App\Models\NewApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AlternateContactController extends Controller
{
    public function create(NewApplication $newApplication): View
    {
        return view('alternatecontact.create', compact('newapplication'));
    }

    public function store(NewApplication $newApplication, AlternateContactRequest $request): RedirectResponse
    {
        $alternatecontact = new AlternateContact($request->all());
        $alternatecontact->application_type_id = $newApplication->application_type_id;
        $newApplication->alternateContacts()->save($alternatecontact);

        return redirect()->route('newapplication.alternate', $newApplication)->with('success', 'Added contact.');
    }

    public function edit(AlternateContact $alternatecontact): View
    {
        return view('alternatecontact.edit', compact('alternatecontact'));
    }

    public function update(AlternateContactRequest $request, AlternateContact $alternatecontact): RedirectResponse
    {
        $alternatecontact->update($request->all());

        return redirect()->route('newapplication.alternate', $alternatecontact->newapplication)->with('success', 'Updated contact.');
    }

    public function destroy(AlternateContact $alternatecontact): RedirectResponse
    {
        $newApplication = $alternatecontact->newapplication;
        $alternatecontact->delete();

        return redirect()->route('newapplication.alternate', $newApplication)->with('success', 'Deleted contact.');
    }
}
