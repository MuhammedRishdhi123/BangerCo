<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use App\Vehicle;
use App\VehicleRate;
use App\User;
use App\Booking;
use App\Offer;
use Mail;
use App\Mail\RegisterEmail;
use Goutte\Client;

use Illuminate\Support\Facades\Validator;
use DB;

class adminController extends Controller
{
    
    public function userAction(Request $request)
    {
        if($request->ajax())
        {
            if($request->action=='edit')
            {
                $user=User::find($request->id);
                $user->status=$request['status'];
                $user->save();
                if($user->status=='a'){
                    $name=$user->name;
                    $status='success';
                    Mail::to($user->email)->send(new RegisterEmail($name,$status));
                }
                else if($user->status=='i'){
                    $name=$user->name;
                    $status='unsuccess';
                    Mail::to($user->email)->send(new RegisterEmail($name,$status));
                }
            }
            if($request->action=='delete')
            {
                $user=User::find($request->id);
                $user->delete();
            }
            return response()->json($request);
        }
    }


    public function bookingAction(Request $request)
    {
        if($request->ajax())
        {
            if($request->action=='edit')
            {
                
                $booking=Booking::find($request->id);
                if($request['status']=='p'){
                    $client = new \GuzzleHttp\Client();
                    $response = $client->request('get','http://127.0.0.1:8080/checkInsurance/'.$booking->user->licenseNo);
                    \Log::info($booking);
                   if($response->getBody()=='true'){
                      return response()->json('FRAUD');
                   }
                   else{
                    $booking->status=$request['status'];
                    $booking->save();
                   }
                  
                }
                else
                {
                 $booking->status=$request['status'];
                 $booking->save();
                }
                
            }
            if($request->action=='delete')
            {
                $booking=Booking::find($request->id);
                $booking->delete();
            }
            return response()->json($request);
        }
    }


    public function offerAction(Request $request)
    {
        if($request->ajax())
        {
            if($request->action=='edit')
            {
                $offer=Offer::find($request->id);
                $offer->title=$request['title'];
                $offer->description=$request['description'];
                $user->save();
            }
            if($request->action=='delete')
            {
                $offer=Offer::find($request->id);
                $offer->delete();
            }
            return response()->json($request);
        }
    }


    public function scrape()
    {
        $data=array();
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.malkey.lk/rates/self-drive-rates.html');
        $crawler->filter('table tbody tr')->each(function($node,$j=0){
           $vehicledata=array();
            $node->filter('td')->each(function($node1,$i=0){
                global $vehicledata;
               $vehicledata[$i]=$node1->text();
               $i++;
            });
           // $data[$j]=$vehicledata;
            \Log::info( $vehicledata);
            $j++;
        });
        return $data;
    }
    
}
