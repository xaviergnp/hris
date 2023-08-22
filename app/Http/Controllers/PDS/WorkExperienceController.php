<?php

namespace App\Http\Controllers\PDS;

use App\Http\Controllers\Controller;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return inertia('Profile/PDS/WorkExperience/Index', [
            'work_experiences' => $request->user()->work_experience()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Profile/PDS/WorkExperience/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkExperience $workExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkExperience $workExperience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkExperience $workExperience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkExperience $workExperience)
    {
        //
    }
}
