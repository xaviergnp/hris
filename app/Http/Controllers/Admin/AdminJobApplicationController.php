<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class AdminJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JobPosting $job_posting)
    {
        return inertia('Admin/Recruitment/JobApplication/Index', [
            "applications" => $job_posting->job_application()->with(['document', 'user'])->paginate()->withQueryString(),
            "posting" => $job_posting
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(JobApplication $jobApplication)
    {
        return inertia('Admin/Recruitment/JobApplication/Show', [
            'application' => $jobApplication->load(['job_posting', 'document', 
                'user' => fn($query) => $query->with(['personal_information'])
            ])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobApplication $jobApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $jobApplication)
    {
        //
    }
}
