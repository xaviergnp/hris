<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        if(!$request->user()->hasRole('superadmin')){
           abort(401);
        }
        return inertia('Admin/Index');
    }
}
