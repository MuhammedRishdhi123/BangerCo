<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use App\Vehicle;
use App\VehicleRate;
use Illuminate\Support\Facades\Validator;
use DB;

class vehicleController extends Controller
{
    public function addVehicle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'model'=>'required|string|max:255',
            'brand'=>'required|string|max:255',
            'color'=>'required|string|max:255',
            'desc'=>'required|string|max:255',
            'plateNo'=>'required|string|max:255',
            'price'=>'required',
            'ageLimit'=>'required'
            
        ]);
    
       if (!$validator->fails()) {
    
    
        
            $vehicle=Vehicle::create([
                'imageUrl'=>"default.png",
                'model'=>$request['model'],
                'brand'=>$request['brand'],
                'color'=>$request['color'],
                'desc'=>$request['desc'],
                'plateNo'=>$request['plateNo'],
                'addedDate'=>Carbon::now(),
                'status'=>$request['status'],
                'ageLimit'=>$request['ageLimit']
            ]);

            $vehicleRate=VehicleRate::create([
                'vehicle_id'=>$vehicle->id,
                'rate'=>$request['price']
            ]);

            $image=$request->file('image');
            $path=public_path().'/vehicle/image/' . $vehicle->id;
            $vehicleImageUrl=$vehicle->id . '/' . $image->getClientOriginalName()  . '.' . $image->getClientOriginalExtension();
            $image->move($path,$vehicleImageUrl);
            $vehicle->imageUrl=$vehicleImageUrl;
            $vehicle->Save();

            return response()->json('Vehicle added to fleet successfully');
       }
       else
       {
           return response()->json(['error'=>$validator->errors()->all()]);
       
        
       }

    }

    //Delete and edit
    public function vehicleAction(Request $request)
    {
        if($request->ajax())
        {
            if($request->action=='edit')
            {
                $data=array(
                    'model'=>$request['model'],
                    'brand'=>$request['brand'],
                    'color'=>$request['color'],
                    'desc'=>$request['desc'],
                    'plateNo'=>$request['plateNo'],
                    'status'=>$request['status'],
                    'ageLimit'=>$request['ageLimit']
                );
                
                DB::table('vehicles')
                ->where('id',$request->id)
                ->update($data);
                $vehicleRate=VehicleRate::where('vehicle_id','=',$request->id)->first();
                $vehicleRate->rate=$request['rate'];
                $vehicleRate->save();
               
            }
            if($request->action=='delete')
            {
                DB::table('vehicles')
                ->where('id',$request->id)
                ->delete();
            }
            return response()->json($request);
        }
    }

    public function getVehicle($id)
    {
        $vehicle=Vehicle::find($id);
        if(!empty($vehicle))
        {
            return response()->json($vehicle);
        }
        else
        {
            return response()->json(['error','No vehicle found']);
        }

    }
}
