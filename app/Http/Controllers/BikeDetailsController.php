<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BikeDetails;
use Storage;
class BikeDetailsController extends Controller
{
    //
    public function getBikeDetails()
    {
        return BikeDetails::all();
    }

   
    public function insertBike(Request $request)
    {
        if ($file = $request->file('file')) {
        $file = $request->file->store('public/documents');
        $model = new BikeDetails();
        $model->brand_id = $request->brand_id;
        $model->bd_catid = $request->bd_catid;
        $model->cc = $request->cc;
        $model->mileage = $request->mileage;
        $model->year = $request->year;
        $model->price = $request->price;
        $model->bd_image = $file;
        $model->bike_name = $request->bike_name;
        $model->weight = $request->weight;
        $model->brand_name = $request->brand_name;
        $model->description = $request->description;
        if ($model->save()) {
            return ['message' => "Bike added Successfully",
            'path' => Storage::disk('public')->url($file)];
        } else {
            return ['message' => "Bike could not be created"];
        }
    }else{
        return ['success' => false,
        'message' => 'File not found in request',
    ];
    }
    }

    public function deleteBikeDetails($id){
        $a = BikeDetails::where('bd_id', $id)->delete();
        if($a){
            return ['message'=>'BikeDetails deleted Successfully'];
        }else{
            return ['message'=>'BikeDetails Not Found'];
        }
    }

}
