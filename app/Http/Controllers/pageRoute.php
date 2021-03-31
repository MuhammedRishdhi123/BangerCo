<?php

namespace App\Http\Controllers;
use App\Vehicle;
use App\VehicleRate;
use App\Booking;
use App\User;
use App\Offer;
use App\Testimonial;
use DateTime;
use Auth;

use Illuminate\Http\Request;

class pageRoute extends Controller
{
    public function index()
    {
        $offers=Offer::paginate(3);
        $testimonials=Testimonial::all();
        // dd($testimonials);
        return view('index')->with(['offers'=>$offers,'testimonials'=>$testimonials]);
    }

    public function fleet()
    {
        //Only allowing customers above 25 years for accessing all the vehicles
        $vehicles=null;
        if(Auth::check())
        {
            $currentAge=(new DateTime(Auth::user()->dob))->diff(new DateTime('today'))->y;
            if($currentAge > 25){
            $vehicles=Vehicle::with('VehicleRate')->get();
            }
            else{
                $vehicles=Vehicle::with('VehicleRate')->where('ageLimit','<',25)->get();
            }
        }
        else
        {
            $vehicles=Vehicle::with('VehicleRate')->get();
        }

        return view('fleet')->with('vehicles',$vehicles);
    }

    public function team()
    {
        return view('team');
    }

    public function offers()
    {
        $offers=Offer::paginate(15);
        return view('offers')->with('offers',$offers);
    }

    public function contact()
    {
        return view('contact');
    }

    public function aboutus()
    {
        return view('about-us');
    }

    public function terms()
    {
        return view('terms');
    }

    public function profile()
    {
        return view('profile');
    }


    public function adminPanel()
    {
        $bookings=Booking::with(['BookingDetail','BookingAdditionalEquip'])->paginate(15);
        $users=User::with('UserDocument')->where('id','!=',Auth::user()->id)->paginate(15);
        $vehicles=Vehicle::with('VehicleRate')->paginate(15);
        $offers=Offer::paginate(15);
        return view('adminPanel')->with(['vehicles'=>$vehicles,'users'=>$users,'bookings'=>$bookings,'offers'=>$offers]);
    }

  

    public function allBooking()
    {
        $bookings=Booking::with(['BookingDetail','BookingAdditionalEquip'])->where('user_id','=',Auth::user()->id)->paginate(15);
        return view('allBooking',['bookings'=>$bookings]);
    }
}
