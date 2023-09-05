<?php

namespace App\Http\Controllers;

use App\Models\DailyTimeRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DailyTimeRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['month']);
            
        return inertia('Profile/DailyTimeRecord/Index', [
            'filters' => $filters,
            'record_sample' => DailyTimeRecord::getRecordByMonth($request->user()->dtr_user_id, $filters)
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
    public function show(DailyTimeRecord $dailyTimeRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyTimeRecord $dailyTimeRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DailyTimeRecord $dailyTimeRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyTimeRecord $dailyTimeRecord)
    {
        //
    }
}
