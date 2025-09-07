<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseholdRequest;
use App\Models\Household;
use App\Models\NewApplication;
use App\Models\PaymentFrequency;

class HouseholdController extends Controller
{
    public function create(NewApplication $newApplication)
    {
        $payment_frequencies = PaymentFrequency::all();

        return view('household.create', compact('newapplication', 'payment_frequencies'));
    }

    public function store(NewApplication $newApplication, HouseholdRequest $request)
    {
        $household = new Household($request->all());
        $household->application_type_id = $newApplication->application_type_id;
        $newApplication->addresses()->save($household);

        return redirect()->route('newapplication.income', $newApplication)->with('success', 'Added household');
    }

    public function edit(Household $household)
    {
        $payment_frequencies = PaymentFrequency::all();

        return view('household.edit', compact('household', 'payment_frequencies'));
    }

    public function update(HouseholdRequest $request, Household $household)
    {
        $household->update($request->all());

        return redirect()->route('newapplication.income', $household->newapplication)->with('success', 'Updated household');
    }

    public function destroy(Household $household)
    {
        $newApplication = $household->newapplication;
        $household->delete();

        return redirect()->route('newapplication.income', $newApplication)->with('success', 'Deleted household.');
    }
}
