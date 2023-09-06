<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DailyTimeRecord extends Model
{
    use HasFactory;

    protected $table = 'daily_time_record';
    protected $fillable = ['user_id', 'date_time'];

    public function scopeFilter(Builder $query, $filters = []) {
        return $query
        
        ->when( // filter by month
            $filters['month'] ?? false, 
            // fn($query, $value) => $query->whereMonth('date_time', $value)
            fn($query, $value) => $query->where(DB::raw("DATE_FORMAT(date_time, '%Y-%m')"), $value),
            fn($query, $value) => $query->where(DB::raw("DATE_FORMAT(date_time, '%Y-%m')"), date('Y-m'))
        )
        
        ->when( // get sched by id
            $filters['user_id'] ?? false, 
            fn($query, $value) => $query->where('user_id', '=', $value)
        )
        
        ->when( // order date_time descending
            $filters['order'] ?? 'desc', 
            fn($query, $value) => $query->orderBy('date_time', $value)
        );
    }

    public static function getRecordByMonth($user_id, $filter = []){
        if(!count($filter)){
            $filter['month'] = date('Y-m'); //set to current month
        }
        
        $yearMonth = date('Y-m', strtotime($filter['month'])); // 2023-09

        // Get the number of days in the given month
        $daysInMonth = date('t', strtotime($yearMonth . "-01")); // day count

        // Initialize the daily time record array
        $dailyTimeRecord = [];

        // Loop through each day of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {

            $date = $day;
            $dateTimeRecordToday = DB::table('daily_time_record')
            ->select(['date_time'])
            ->where('user_id', '=', $user_id)
            ->where(DB::raw("DATE_FORMAT(date_time, '%Y-%m-%e')"), $yearMonth . '-' . $date)
            ->get();

            // dd($dateTimeRecordToday);
            // initialize time in/out in the morning and afternoon
            $inAM = null;
            $outAM = null;
            $inPM = null;
            $outPM = null;
            
            $logTimeBetween7to11 = array();
            $logTimeBetween12to3 = array();
            $logTimeBetween3onwards = array();

            if(count($dateTimeRecordToday)){
                foreach($dateTimeRecordToday as $dtrRecord){
                    $time = Carbon::create($dtrRecord->date_time);
                    $logTime = Carbon::parse($time->toTimeString());

                    if($logTime->lessThan(Carbon::parse('11:00:00'))){
                        array_push($logTimeBetween7to11, $time);
                    }
    
                    if($logTime->greaterThan(Carbon::parse('11:00:00')) && $logTime->lessThan(Carbon::parse('15:00:00'))){
                        array_push($logTimeBetween12to3, $time);
                    }

                    if($logTime->greaterThan(Carbon::parse('15:01:00'))){
                        array_push($logTimeBetween3onwards, $time);
                    }
                }
            }

            $inAM = $logTimeBetween7to11[0] ?? null;
            $outAM = $logTimeBetween12to3[0] ?? null;
            $inPM = $logTimeBetween12to3[count($logTimeBetween12to3) - 1] ?? null;
            $outPM = $logTimeBetween3onwards[0] ?? null;
            $total = null;
            $totalAM = null;
            $totalPM = null;

            if($inAM && $outAM){
                $logTimeInAm = Carbon::parse($inAM->format('H:i'));
                $logTimeOutAm = Carbon::parse($outAM->format('H:i'));

                $time_in_earlier_7 = $logTimeInAm->lessThan(Carbon::parse('7:00:00'));
                $time_in_pass_7 = $logTimeInAm->greaterThan(Carbon::parse('7:00:00'));
                $time_out_earlier_12 = $logTimeOutAm->lessThan(Carbon::parse('12:00:00'));
                $time_out_pass_12 = $logTimeOutAm->greaterThanOrEqualTo(Carbon::parse('12:00:00'));

                $exact12 = Carbon::parse('12:00');

                if($time_in_earlier_7 && $time_out_earlier_12) {
                    $totalAM = $logTimeOutAm->diffInSeconds(Carbon::parse('7:00'));
                }else if($time_in_earlier_7 && $time_out_pass_12){
                    $totalAM = $exact12->diffInSeconds(Carbon::parse('7:00'));
                }else if($time_in_pass_7 && $time_out_earlier_12){
                    $totalAM = $logTimeOutAm->diffInSeconds($logTimeInAm);
                }else if($time_in_pass_7 && $time_out_pass_12){
                    $totalAM = $exact12->diffInSeconds($logTimeInAm);
                }
            }

            if($inPM && $outPM){
                $logTimeInPm = Carbon::parse($inPM->format('H:i'));
                $logTimeOutPm = Carbon::parse($outPM->format('H:i'));

                $time_in_earlier_13 = $logTimeInPm->lessThan(Carbon::parse('13:00:00'));
                $time_in_pass_13 = $logTimeInPm->greaterThan(Carbon::parse('13:00:00'));
                $time_out_earlier_19 = $logTimeOutPm->lessThan(Carbon::parse('19:00:00'));
                $time_out_pass_19 = $logTimeOutPm->greaterThan(Carbon::parse('19:00:00'));
                // $time_out_pass_12 = $logTimeOutPm->greaterThan(Carbon::parse('12:00:00'));

                $exact19 = Carbon::parse('19:00');

                // dd($time_in_earlier_13 && $time_out_earlier_19);

                if($time_in_earlier_13 && $time_out_earlier_19) { // time in before 1 and time out before 7 PM
                    $totalPM = $logTimeOutPm->diffInSeconds(Carbon::parse('13:00'));  // 1 PM until out before 7 PM
                }else if($time_in_earlier_13 && $time_out_pass_19 ){
                    $totalPM = $exact19->diffInSeconds(Carbon::parse('13:00'));  // 1 PM until out pass 7 PM
                }else if($time_in_pass_13 && $time_out_earlier_19){
                    $totalPM = $logTimeOutPm->diffInSeconds($logTimeInPm);
                }else if($time_in_pass_13 && $time_out_pass_19){
                    $totalPM = $exact19->diffInSeconds($logTimeInPm);
                }
            }

            // if($inPM && $outPM){
            //     $totalPM = $outPM->diffInSeconds($inPM);
            // }

            if($totalAM || $totalPM){
                if($totalAM) {
                    $total = gmdate('H:i:s', $totalAM);
                }

                if($totalPM){
                    $total = gmdate('H:i:s', $totalPM);
                }

                if($totalAM && $totalPM){
                    $total = gmdate('H:i:s', $totalAM + $totalPM);
                }
            }


            

            $dayOfWeek = date('D', strtotime($yearMonth . '-' . $date));
            // Create a daily record for the current day
            $record = [
                'date' => $date,
                'day' => $dayOfWeek,
                'inAM' => $inAM ? $inAM->format('h:i:00 A') : null,  
                'outAM' => $outAM ? $outAM->format('h:i:00 A') : null,
                'inPM' => $inPM ? $inPM->format('h:i:00 A') : null,
                'outPM' => $outPM ? $outPM->format('h:i:00 A') : null,
                'totalHours' => $total,
            ];

            // Add the daily record to the array
            $dailyTimeRecord[] = $record;
        }

        return $dailyTimeRecord;

    }
}
