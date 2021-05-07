<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\UserDocument;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use File;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ComplaintEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

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
            'licenseNo'=>'License No.',
            'drivinglicense'=>'Driving license',
            'identitydoc'=>'Identity document'
        );
       $validator= Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dob'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'licenseNo'=>'required',
            'drivinglicense'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            'identitydoc'=>'required|image|mimes:jpeg,png,jpg|max:2048',
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
            'status'=>'i',
            'dob'=>$data['dob'],
            'address'=>$data['address'],
            'mobile'=>$data['mobile'],
            'licenseNo'=>$data['licenseNo'],
        ]);
        
        $license=$data['drivinglicense'];
        $identityDoc=$data['identitydoc'];
        $path=public_path().'/user/profile/document/' . $user->id; 
        
        $licenseName='license.' . $license->getClientOriginalExtension();
        $license->move($path,$licenseName);
        $identityDocName='identityDoc.' . $identityDoc->getClientOriginalExtension();
        $identityDoc->move($path,$identityDocName);
        
        UserDocument::create([
            'drivingLicense'=>$user->id . '/' . $licenseName,
            'identityProof'=>$user->id . '/' . $identityDocName,
            'user_id'=>$user->id,
        ]);

        Role::create([
            'user_id'=>$user->id,
            'roleName'=>$data['role']
        ]);

        

        return $user; 
    }

    

    public function register(Request $request)
    {
        $dmvEmail="bangercosl@gmail.com";
        $checked=FALSE;
        $licenses=[];
        $location='C:/Users/INTEL/Desktop/EIRLS/BangerCo/public/license.csv';
        if (($handle = fopen($location, 'r')) !== FALSE) { // Check the resource is valid
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { // Check opening the file is OK!
                foreach($data as $line){
                    if(strcmp($line,$request['licenseNo']) != -1){
                        $checked=TRUE;
                    }
                }
            }
        }
        fclose($handle);


        $this->validator($request->all())->validate();

        if($checked == FALSE){
           
        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath())->with('info','Thank you for registering with us. We will review your account and send you a email when it is active.');
        }
        else{
            $date = date('m/d/Y h:i:s a', time());
            $licenseNo=$request['licenseNo'];
            $email=$request['email'];
            Mail::to($dmvEmail)->send(new ComplaintEmail($date,$licenseNo,$email));
            return redirect($this->redirectPath())->with('info','Your License has been suspended or lost Please contact the DMV for more info!');
        }
    }



    
}
