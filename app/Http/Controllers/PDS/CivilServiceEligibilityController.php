<?php

namespace App\Http\Controllers\PDS;

use App\Http\Controllers\Controller;
use App\Models\CivilServiceEligibility;
use Illuminate\Http\Request;

class CivilServiceEligibilityController extends Controller
{
    //show civil service eligibility page
    public function index(Request $request) {
        return inertia('Profile/PDS/CivilServiceEligibility/Index', [
            "eligibilities" => $request->user()->civil_service_eligibility()->paginate(10)
        ]);
    }

    public function create(Request $request) {
        return inertia('Profile/PDS/CivilServiceEligibility/Create');
    }

    //  function to add eligibility
    public function store(Request $request) {
        $validate = $request->validate([
            "cs_board_bar_ces_csee_barangay_drivers" => "required|string",
            "rating" => "string|nullable",
            "date_of_exam_conferment" => "date|nullable",
            "place_of_exam_conferment" => "string|nullable",
            "license_number" => "string|nullable",
            "license_date_of_validity" => "date|nullable",
        ]);

        $request->user()->civil_service_eligibility()->create($validate);

        return back()->with('success', 'Record saved.');
    }

    public function edit(CivilServiceEligibility $civil_service_eligibility) {
        return inertia('Profile/PDS/CivilServiceEligibility/Edit', [
            'civil_service_eligibility' => $civil_service_eligibility
        ]);
    }

    public function update(Request $request, CivilServiceEligibility $civil_service_eligibility) {
        $validate = $request->validate([
            "cs_board_bar_ces_csee_barangay_drivers" => "required|string",
            "rating" => "string|nullable",
            "date_of_exam_conferment" => "date|nullable",
            "place_of_exam_conferment" => "string|nullable",
            "license_number" => "string|nullable",
            "license_date_of_validity" => "date|nullable",
        ]);

        $civil_service_eligibility->update($validate);

        return back()->with('success', 'Record updated.');
    }

    //  function to delete eligibility
    public function destroy(CivilServiceEligibility $civil_service_eligibility) {
        $civil_service_eligibility->delete();

        return back()->with('success', 'Record Deleted.');
    }

}
