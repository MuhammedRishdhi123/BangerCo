<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;
use Hash;
use Image;


class userController extends Controller
{
    public function getUser()
    {
       
            $user=Auth::user();
            return view('profile',['user'=>$user]);
        
    }

    public function updateUser(Request $request)
    {
        $user=Auth::user();
        $user->name=$request['name'];
        if(!empty($request->input('password')))
        {
            $user->password=Hash::make($request['password']);
        }
        $user->address=$request['address'];
        $user->mobile=$request['mobile'];
        $user->save();
        return back()->with('success','Profile Updated Successfully !');
    }

    public function changeProfileImage(Request $request)
    {
        if($request->hasFile('image')){
        $image=$request->file('image');
        $fileName=Auth::id() . '.' . $image->getClientOriginalExtension();
         Image::make($image)->resize(300,300)->save(public_path('/user/profile/image/' . $fileName));
        $user=Auth::user();
        $user->imgLoc=$fileName;
        $user->Save();
        return response()->json($fileName);
        }
    }




}
