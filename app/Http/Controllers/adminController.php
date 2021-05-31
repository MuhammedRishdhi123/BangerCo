<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use App\Vehicle;
use App\VehicleRate;
use App\User;
use App\Booking;
use App\Offer;
use App\ViewCustomer;
use App\Role;
use App\WebScrape;
use Mail;
use App\Mail\RegisterEmail;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use DB;
use DataTables;

class adminController extends Controller
{

    use RegistersUsers;
    protected $redirectTo = '/';
    
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
                $booking->status=$request['status'];
                $booking->save();
                
                
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
                $offer->save();
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
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array('timeout'=>60,));
        $goutteClient->setClient($guzzleClient);
        $crawler = $goutteClient->request('GET', 'https://www.malkey.lk/rates/self-drive-rates.html');
        $outercounter=0;
        $crawler->filter('table tbody tr')->each(function($node) use (&$data,&$outercounter){
        $vehicle=new \stdClass();
             $node->filter('td.text-left.percent-40')->each(function($node1) use (&$vehicle){
                $vehicle->name=$node1->text();
             });
             $count=0;
             $node->filter('td.text-center.percent-22')->each(function($node1) use (&$vehicle,&$count){
                 if($count==0){
                     $vehicle->monthly=$node1->text();
                     $count++;
                 }
                 else if($count==1){
                    $vehicle->weekly=$node1->text();
                    $count++;
                 }
                 else{
                    $vehicle->millage=$node1->text();
                 }
             });
             if($outercounter > 0){
                 $data[]=$vehicle;
             }
             $outercounter++;
           
        });
        //$data=json_encode($data);
        return $data;
      
    }



    //Admin registration

      /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $attributeNames=array(
            'name'=>'Name',
            'email'=>'Email',
            'password'=>'Password',
            'dob'=>'Date of birth',
            'address'=>'Address',
            'mobile'=>'Mobile',
        );
       $validator= Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dob'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'role'=>'required|string'
        ]);
        $validator->setAttributeNames($attributeNames);
        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'imgLoc'=> 'default.png',
            'status'=>'a',
            'dob'=>$data['dob'],
            'address'=>$data['address'],
            'mobile'=>$data['mobile'],
        ]);
        

        Role::create([
            'user_id'=>$user->id,
            'roleName'=>$data['role']
        ]);

        return $user; 
    }



    public function register(Request $request)
    {

        $this->validator($request->all())->validate();
           
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath())->with('info','Welcome to Banger Co '. $user->name);
        
        
    }


    
}
