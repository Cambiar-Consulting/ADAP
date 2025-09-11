<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgencyRequest;
use App\Models\Agency;
use Illuminate\Support\Facades\Gate;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Agency::class);

        $agencies = Agency::all();

        return view('agency.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Agency::class);

        return view('agency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgencyRequest $request)
    {
        Gate::authorize('create', Agency::class);

        Agency::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('agency.index')->with('success', 'Agency created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        Gate::authorize('view', $agency);

        return view('agency.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        Gate::authorize('update', $agency);

        return view('agency.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgencyRequest $request, Agency $agency)
    {
        Gate::authorize('update', $agency);

        $agency->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('agency.index')->with('success', 'Agency updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        Gate::authorize('delete', $agency);

        $agency->delete();

        return redirect()->route('agency.index')->with('success', 'Agency deleted successfully.');
    }
}
