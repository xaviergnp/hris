<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Rats\Zkteco\Lib\ZKTeco;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

    
    protected function schedule(Schedule $schedule): void
    {

        $schedule->call(function() {

            $zk = new ZKTeco('192.168.222.4', 4370);
            
            $zk->connect();
    
            $dtrs = $zk->getAttendance();

            DB::table('daily_time_record')->truncate();

            foreach($dtrs as $dtr){

                DB::table('daily_time_record')->insert([
                    'user_id' => $dtr['id'],
                    'date_time' => $dtr['timestamp'],
                ]);
            }
    
            $zk->disconnect();
        })->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
