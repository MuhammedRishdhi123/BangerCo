<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Offer;

class offerController extends Controller
{
    public function addOffer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if(!$validator->fails())
        {
          
            $offer= Offer::create([
                'title'=>$request['title'],
                'description'=>$request['description']
            ]);
            
            $image=$request->file('image');
            $imageName=$offer->id . "." . $image->getClientOriginalExtension();
            $path = public_path().'/offer/image/';
            $image->move($path,$imageName);
            $offer->imgLoc=$imageName;
            $offer->save();
            return response()->json('Offer added successfully !');
            
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
}
