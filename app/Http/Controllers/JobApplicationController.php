<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobApplicationAttachment;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{

    public function create(Request $request, JobPosting $job_posting)
    {
        
        return inertia('JobApplication/Index', [
            "job_posting" => $job_posting,
        ]);
    }

    public function store(Request $request, JobPosting $job_posting) {
        // check if user already applied
        $user_application = JobPosting::whereRelation(
            'job_application', 'user_id', '=', $request->user()->id
        )->get();

        if(count($user_application) > 0){
            return redirect()->back()->with('warning', 'You have already submitted your application.');
        }

        // validate the files
        $request->validate([
            'documents' => 'required|array|min:1',
            'documents.*'=> 'required|mimes:png,jpg,jpeg,pdf|max:5000' 
        ], [
            'documents.*.mimes' => 'Only image (.png, .jpg, .jpeg) and PDF (.pdf) format is accepted.',
            'documents.required' => 'Please upload the required documents'
        ]);

        
        if($request->hasFile('documents')){
            $job_application = $request->user()->job_application()->create(
                [
                    'job_posting_id' => $job_posting->id,
                ]
            );
            foreach ($request->file('documents') as $file){
                $path = $file->store('documents', 'public');

                $job_application->document()->save(new JobApplicationAttachment([
                    'filename' => $file->getClientOriginalName(),
                    'path' => $path
                ]));
            }
            return back()->with('success', 'Application has been submitted.');
        }

    }

}
