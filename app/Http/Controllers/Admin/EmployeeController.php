<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        return inertia('Admin/Employee/Index', [
            'employees' => User::paginate(10)->withQueryString()
        ]);
    }
    //
    public function create()
    {
        return inertia('Admin/Employee/Create');
    }
    //
    public function store(Request $request)
    {
        Validator::extend('valid_username', function($attr, $value){
            return preg_match('/^[a-zA-Z0-9_-]{3,20}$/', $value);
        });

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|valid_username|max:255|unique:'.User::class,
            'dtr_user_id' => 'required|integer|unique:users,dtr_user_id',
            'password' => ['required', 'confirmed', Password::defaults()],
        ], [
            'username.valid_username' => 'Invalid Username.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'dtr_user_id' => $request->dtr_user_id,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('employee');

        return back()->with('success', "$request->username has been registered." );
    }
}
