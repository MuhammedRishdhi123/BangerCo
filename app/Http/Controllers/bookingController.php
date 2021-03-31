<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\BookingDetail;
use App\AdditionalEquip;
use App\Booking;
use App\BookingAdditionalEquip;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class bookingController extends Controller
{
   public function checkAvailability(Request $request)
   {
        $fromDate=$request['fromDate'];
        $toDate=$request['toDate'];
        $vehicleid=$request['vehicleid'];
        
        //This function checks whether the vehicle is already booked
        $isBooked=BookingDetail::where('vehicle_id',$vehicleid)
        ->where(function($query) use ($fromDate,$toDate){
           $query->where(function ($q) use ($fromDate,$toDate){
              $q->where('pickupDate','>=',$fromDate)
              ->where('pickupDate','<',$toDate);
           })->orWhere(function ($q) use ($fromDate,$toDate){
              $q->where('pickupDate','<=',$fromDate)
              ->where('dropoffDate','>',$toDate);
           })->orWhere(function ($q) use ($fromDate,$toDate){
              $q->where('dropoffDate','>',$fromDate)
              ->where('dropoffDate','<=',$toDate);
           })->orWhere(function ($q) use ($fromDate,$toDate){
              $q->where('pickupDate','>=',$fromDate)
              ->where('dropoffDate','<=',$toDate);
           });
        })->count();
        if($isBooked == 0)
        {
         $vehicle=Vehicle::find($vehicleid);
         $bookingHours=((strtotime($toDate)-strtotime($fromDate))/(60*60));//converting the date difference to hours
         
         if($bookingHours>=5 && $bookingHours<=336)
         {
            $totalCost=0;
            if($bookingHours==5){
               $totalCost=$vehicle->VehicleRate['rate']/2;
               
            }
            else{
               $numberOfDays=round($bookingHours/24);
               if($numberOfDays<1){
                  $totalCost=1*$vehicle->VehicleRate['rate'];      
               }
               else{
                  $totalCost=($numberOfDays)*$vehicle->VehicleRate['rate'];
               }
            }
            $additionalEquips=AdditionalEquip::where('quantity','>',0)->get();
            return view('booking',['vehicle'=>$vehicle,'totalCost'=>$totalCost,'additionalEquips'=>$additionalEquips,'fromDate'=>$fromDate,'toDate'=>$toDate])->render();
         }
         else
         {
            return redirect()->back()->withErrors(['Sorry the allowed booking range is minimum of 5 hours and maximum of 2 weeks !']);
         }
        }
        else
        {
           return redirect()->back()->withErrors(['Sorry the vehicle is already booked on the selected date']);
        }
        
   }


   public function makeBooking(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'vehicleid' => 'required',
         'model'=>'required|string|max:255',
         'additionalEquip'=>'nullable',
         'fromDate'=>'required|date',
         'toDate'=>'required|date',
         'picklocation'=>'required|string|max:255',
         'droplocation'=>'required|string|max:255',
         'cost'=>'required'
         
     ]);

     if(!$validator->fails())
     {
        $booking=Booking::create([
         'user_id'=>Auth::user()->id,
         'status'=>'i',
         'bookingDate'=>Carbon::now()
        ]);

        $bookingDetail=BookingDetail::create([
         'booking_id'=>$booking->id,
         'vehicle_id'=>$request['vehicleid'],
         'pickupLoc'=>$request['picklocation'],
         'dropoffLoc'=>$request['droplocation'],
         'pickupDate'=>$request['fromDate'],
         'dropoffDate'=>$request['toDate'],
         'extend'=>false
        ]);

        if(!empty($request->input('additionalEquip')))
        {
           foreach($request['additionalEquip'] as $ae)
           {
               
               $additionalEquips=BookingAdditionalEquip::create([
                  'booking_id'=>$booking->id,
                  'additionalEquip_id'=>$ae
               ]);
               AdditionalEquip::find($ae)->decrement('quantity');
           }
            
        }
      
        return redirect()->route('allBooking')->with('success','Your booking was successfully placed!');
     }
     else
     {
        return back()->withErrors($validator)->withInput();
     }
   }


   public function updateBooking(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'bookingId' => 'required',
         'picklocation'=>'required|string|max:255',
         'droplocation'=>'required|string|max:255',
         'additionalEquip'=>'array|nullable'
     ]);

     if(!$validator->fails()){
        $bookingId=$request['bookingId'];
        $booking=Booking::with(['BookingDetail','BookingAdditionalEquip'])->where('id','=',$bookingId)->first();

        $booking->bookingDetail()->update(['pickupLoc'=>$request['picklocation']]);
        $booking->bookingDetail()->update(['dropoffLoc'=>$request['droplocation']]);
      
        if(!empty($request->input('additionalEquip')))
        {
          $bookingAdditionalEquips=BookingAdditionalEquip::where('booking_id','=',$bookingId)->get();
           foreach($bookingAdditionalEquips as $ae)
           {
               AdditionalEquip::find($ae->additionalEquip_id)->increment('quantity');
               $ae->delete();
           }
      
           foreach($request['additionalEquip'] as $ae)
           {  
               $additionalEquips=BookingAdditionalEquip::create([
                  'booking_id'=>$booking->id,
                  'additionalEquip_id'=>$ae
               ]);
               AdditionalEquip::find($ae)->decrement('quantity');
           }
        }
        return redirect()->route('allBooking')->with('success','Your booking was successfully updated!');
      }
      else{
         return back()->withErrors($validator)->withInput();
      }
   }

   public function getAdditionalEquips()
   {
      $additionalEquips=AdditionalEquip::where('quantity','>',0)->get();
      return response()->json(['additionalEquips'=>$additionalEquips]); 
   }


   public function extendBooking(Request $request)
   {
      $bookingId=$request['bookingId'];
      $booking=Booking::with(['BookingDetail','BookingAdditionalEquip'])->where('id','=',$bookingId)->first();
      $vehicleId=$booking->bookingDetail->vehicle_id;
      $dropoffDate=$booking->bookingDetail->dropoffDate;
      
      $dropoffDate=date('Y-m-d', strtotime( $dropoffDate. '1 days'));
      $isAvailable=BookingDetail::where('vehicle_id',$vehicleId)->where(function($query) use ($dropoffDate){
         $query->whereDate('pickupDate','=',$dropoffDate);
      })->count();

      
     if($isAvailable == 0){
        $booking->bookingDetail->update(['extend'=>'1']);
      return response()->json(['result'=>'Booking extended successfully !']);
     }
     else{
        return response()->json(['error'=>'Sorry, unable to extend the booking !']);
     }
   }
}
