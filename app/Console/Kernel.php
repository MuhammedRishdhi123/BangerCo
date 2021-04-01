<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $client = new \GuzzleHttp\Client();
            $name='C:/Users/INTEL/Desktop/EIRLS/BangerCo/public/license.csv';
            $response = $client->request('get','http://127.0.0.1:8081/getLicenses');
    
            $data=$response->getBody();
            $data=json_decode($data);
            $fp = fopen($name, 'w');
            $license=array();
            $counter=0;
            foreach ( $data as $line ) {
               $license[$counter]=$line;
               $counter++;
            }
            fputcsv($fp, $license);
            fclose($fp);
           

        })->dailyAt('00:05');


        $schedule->call(function(){
            $users=User::All();
            foreach($users as $user){
                $bookings=$user->booking()->get();
                foreach($bookings as $booking){
                    $bookingdetail=$booking->bookingDetail()->get();
                    if(strtotime($bookingdetail[0]->pickupDate) > time()){
                        $user->status='b';
                        $user->save();
                    }
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
