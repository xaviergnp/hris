<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class JobPostingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->authorizeResource(JobPosting::class, ['view']);
    }
    
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'order_by', 'order']);

        // dd($filters);

        return inertia('Recruitment/JobPosting/Index', [
            'job_vacancies' => JobPosting::filter($filters)->paginate(15)->withQueryString(),
            'filters' => $filters
        ]);
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
            "plantilla_item_no" => "required|string|max:255|unique:job_postings,plantilla_item_no",
            "position" => "required|string|max:255",
            "salary_grade" => "required|integer",
            "monthly_salary" => "required|integer",
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
    public function show(JobPosting $job_posting)
    {
        return inertia('Recruitment/JobPosting/Show', [
            'job_posting' => $job_posting
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPosting $job_posting)
    {
        return inertia('Recruitment/JobPosting/Edit', [
            'job_posting' => $job_posting
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobPosting $job_posting)
    {
        $messages = [
            'plantilla_item_no.unique' => 'The Plantilla Item already exists in the database.'
        ];

        $validated = Validator::make($request->all(), [
            "place_of_assignment" => "required|string|max:255",
            "plantilla_item_no" => ["required", "string", Rule::unique('job_postings')->ignore($job_posting->id)],
            "position" => "required|string|max:255",
            "salary_grade" => "required|integer",
            "monthly_salary" => "required|integer",
            "eligibility" => "required|string|max:255",
            "education" => "required|string|max:255",
            "training" => "required|string|max:255",
            "work_experience" => "required|string|max:255",
            "competency" => "required|string|max:255",
            "posting_date" => "required|date",
            "closing_date" => "required|date"
        ], $messages)->validate();
        
        $job_posting->update($validated);

        return back()->with('success', 'Record updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPosting $job_posting)
    {
        $job_posting->deleteOrFail();

        return redirect(route('recruitment.job_posting.index'))->with('success', 'Record successfully deleted!');
    }
}
