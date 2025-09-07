<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\AddressType;
use App\Models\NewApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AddressController extends Controller
{
    public function create(NewApplication $newApplication): View
    {
        $addresstypes = AddressType::all();

        return view('address.create', compact('newApplication', 'addresstypes'));
    }

    public function store(NewApplication $newApplication, AddressRequest $request): RedirectResponse
    {
        $address = new Address($request->all());
        $address->application_type_id = $newApplication->application_type_id;
        $newApplication->addresses()->save($address);

        return redirect()->route('newapplication.contact', $newApplication)->with('success', 'Added address');
    }

    public function edit(Address $address): View
    {
        $addresstypes = AddressType::all();

        return view('address.edit', compact('address', 'addresstypes'));
    }

    public function update(AddressRequest $request, Address $address): RedirectResponse
    {
        $address->update($request->all());

        return redirect()->route('newapplication.contact', $address->newapplication)->with('success', 'Updated address');
    }

    public function destroy(Address $address): RedirectResponse
    {
        $newApplication = $address->newapplication;
        $address->delete();

        return redirect()->route('newapplication.contact', $newApplication)->with('success', 'Deleted address.');
    }
}
