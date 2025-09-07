<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneNumberRequest;
use App\Models\NewApplication;
use App\Models\PhoneNumber;
use App\Models\PhoneNumberType;

class PhoneNumberController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(NewApplication $newApplication)
    {
        $phoneNumberTypes = PhoneNumberType::all();

        return view('phonenumber.create', compact('newApplication', 'phoneNumberTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewApplication $newApplication, PhoneNumberRequest $request)
    {
        $phone = new PhoneNumber($request->all());
        $phone->application_type_id = $newApplication->application_type_id;
        $newApplication->phoneNumbers()->save($phone);

        return redirect()->route('newapplication.contact', $newApplication)->with('success', 'Added phone number');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhoneNumber $phonenumber)
    {
        $phoneNumberTypes = PhoneNumberType::all();

        return view('phonenumber.edit', compact('phonenumber', 'phoneNumberTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhoneNumberRequest $request, PhoneNumber $phonenumber)
    {
        $phonenumber->update($request->all());

        return redirect()->route('newapplication.contact', $phonenumber->newapplication)->with('success', 'Updated phone');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhoneNumber $phonenumber)
    {
        $newApplication = $phonenumber->newapplication;
        $phonenumber->delete();

        return redirect()->route('newapplication.contact', $newApplication)->with('success', 'Deleted phone.');
    }
}
