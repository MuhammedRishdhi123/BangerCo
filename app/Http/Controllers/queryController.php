<?php

namespace App\Http\Controllers;
use App\contactQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class queryController extends Controller
{
    public function makeQuery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'message'=>'required',
          ]);
        if(!$validator->fails())
        {
            $contact=contactQuery::create($request->all());
            return redirect()->back()->with('success','Thank you for contacting us. We will get back to you soon!');
        }
        else
        {
            return redirect('/contactus')->withErrors($validator)->withInput();
        }
    }
}
