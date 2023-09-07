<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        return inertia('Admin/Employee/Index');
    }
    //
    public function create()
    {
        return inertia('Admin/Employee/Create');
    }
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|regex:/\w*$/|max:255|unique:'.User::class,
            'dtr_user_id' => 'required|integer',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'dtr_user_id' => $request->dtr_user_id,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('employee');

        return back()->with('success', 'Account has been registered.');
    }
}
