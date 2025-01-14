<?php

use App\Models\JobPosting;
use Illuminate\Support\Facades\Config;

if(Config::get('app.debug')){
    JobPosting::create([
        "place_of_assignment" => "NEDA Region 2",
        "plantilla_item_no" => "QWETY123",
        "position" => "Economic Development Specialist I",
        "salary_grade" => "12",
        "monthly_salary" => "3210",
        "eligibility" => "Civil Service Eligibility or equivalent",
        "education" => "Bachelor of Science in Economics",
        "training" => "None Required",
        "work_experience" => "None Required",
        "competency" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error excepturi eum laudantium.",
        "posting_date" => now(),
        "closing_date" => now(),
        "by_user_id" => 1
    ]);
}

?>

