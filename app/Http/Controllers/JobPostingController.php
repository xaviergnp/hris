<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Recruitment/JobPosting/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Recruitment/JobPosting/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "place_of_assignment" => "required|string|max:255",
            "position" => "required|string|max:255",
            "salary_grade" => "required|string|max:255",
            "monthly_salary" => "required|integer|max:255",
            "eligibility" => "required|string|max:255",
            "education" => "required|string|max:255",
            "training" => "required|string|max:255",
            "work_experience" => "required|string|max:255",
            "competency" => "required|string|max:255",
            "posting_date" => "required|date",
            "closing_date" => "required|date"
        ]);

        $request->user()->job_posting()->create($validateData);

        return back()->with('success', 'Record added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
