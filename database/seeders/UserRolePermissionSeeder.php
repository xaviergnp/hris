<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;


        $permissions = ['Access Admin', 'Manage Roles and Permissions', 'Manage Job Vacancies'];
        $roles = ['superadmin', 'admin', 'hr', 'user', 'employee'];

        foreach($roles as $role){
            Role::create(['name' => $role]);
        }

        $user = User::create([
            'name' => 'Test Account',
            'email' => 'test@mail.dev',
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole('superadmin');

        event(new Registered($user));

        Auth::login($user);



        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);

            $role = Role::findByName('superadmin');
            $role->givePermissionTo($permission);
        }
?>