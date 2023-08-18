<?php

namespace App\Http\Controllers\PDS;

use App\Http\Controllers\Controller;
use App\Models\Children;
use Illuminate\Http\Request;

class FamilyBackgroundController extends Controller
{
    public function edit(Request $request) {
        return inertia('Profile/PDS/FamilyBackground/Edit', [
            'children' => $request->user()->children
        ]);
    }

    public function store_child(Request $request) {
        $validate = $request->validate([
            'fullname' => 'required|string|max:255',
            'date_of_birth' => 'required|date'
        ]);

        $request->user()->children()->create($validate);

        return back()->with('success', 'Record saved.');
    }

    public function delete_child(Children $children) {
        $children->delete();
        return back()->with('success', 'Successfully Deleted.');
    }
}
