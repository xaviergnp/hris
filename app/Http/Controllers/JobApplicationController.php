<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{

    public function update_pds(Request $request, JobPosting $job_posting)
    {
        return inertia('JobApplication/Application/UpdatePDS', [
            "job_posting" => $job_posting,
            "personal_information" => $request->user()->personal_information ]);
    }

    // show page for uploading attachments
    public function create_attachments(Request $request, JobPosting $job_posting)
    {
        return inertia('JobApplication/Application/Attachments', [
            "job_posting" => $job_posting,
            "personal_information" => $request->user()->personal_information ]);
    }
    public function review(Request $request, JobPosting $job_posting)
    {
        return inertia('JobApplication/Application/ReviewApplication', [
            "job_posting" => $job_posting,
            "personal_information" => $request->user()->personal_information ]);
    }
}
