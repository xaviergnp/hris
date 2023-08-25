<?php

namespace App\Http\Controllers\PDS;

use App\Http\Controllers\Controller;
use App\Models\PageFourReferencesId;
use Illuminate\Http\Request;

class PageFourReferencesIdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return inertia('Profile/PDS/PageFourReferencesId/Index', [
            'reference_id' => $request->user()->references_id
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        return inertia('Profile/PDS/PageFourReferencesId/Edit', [
            'references_and_id' => $request->user()->references_id
        ]);
    }


    public function store_or_update(Request $request) {

        $user = $request->user();

        $validate = $request->validate([
            "references_name_one" => "string|nullable",
            "references_address_one" => "string|nullable",
            "references_telephone_one" => "string|nullable",
            "references_name_two" => "string|nullable",
            "references_address_two" => "string|nullable",
            "references_telephone_two" => "string|nullable",
            "references_name_three" => "string|nullable",
            "references_address_three" => "string|nullable",
            "references_telephone_three" => "string|nullable",
            "government_issued_id" => "string|nullable",
            "id_license_passport_number" => "string|nullable",
            "date_place_of_issuance" => "string|nullable",
            "co_government_issued_id" => "string|nullable",
            "co_id_license_passport_number" => "string|nullable",
            "co_date_place_of_issuance" => "string|nullable",
            "photo" => "string|nullable",
        ]);

        if(!$user->references_id()->exists()){
            $user->references_id()->create($validate);
        }else{
            $user->references_id()->update($validate);
        }
        
        return back()->with('success', 'Record saved.');
    }

}
