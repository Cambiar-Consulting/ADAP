<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Models\Agency;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', User::class);

        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', User::class);

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        Gate::authorize('create', User::class);

        User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'alias' => $request->alias,
            'date_of_birth' => $request->date_of_birth,
            'ssn' => $request->ssn,
            'agency_id' => $request->agency_id
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        Gate::authorize('view', $user);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // verify they can edit the user
        Gate::authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        Gate::authorize('update', $user);
        $user->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'alias' => $request->alias,
            'date_of_birth' => $request->date_of_birth,
            'ssn' => $request->ssn,
            'agency_id' => $request->agency_id
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete', $user);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function showRegistrationForm()
    {
        $agencies = Agency::all()->pluck('name', 'id');
        $agencies->prepend('Select an Agency', '');
        return view('users.register', compact('agencies'));
    }

    public function register(UserRequest $request)
    {
        User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'alias' => $request->alias,
            'date_of_birth' => $request->date_of_birth,
            'ssn' => $request->ssn,
            'agency_id' => $request->agency_id
        ]);

        return redirect()->route('home')->with('success', 'User registered successfully.');
    }
}
