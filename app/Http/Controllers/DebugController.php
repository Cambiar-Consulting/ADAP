<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Views\UserWithRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebugController extends Controller
{
    public function login(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Successfully logged in as '.$user->full_name);
    }

    public function loginAs()
    {
        $roles = Role::all();
        $users = collect();
        foreach ($roles as $role) {
            $users[$role->id] = UserWithRole::where('role_id', $role->id)->get();
        }

        return view('debug.loginAs', compact('users', 'roles'));
    }
}
