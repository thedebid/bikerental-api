<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    //
    public function getBookingById($id)
    {
        $booking = Booking::leftJoin('bikedetails', 'booking.bd_id', '=', 'bikedetails.bd_id')
            ->where(['booking.user_id' => $id])
            ->get(['booking.*', 'bikedetails.cc', 'bikedetails.mileage', 'bikedetails.year', 'bikedetails.weight', 'bikedetails.description', 'bikedetails.price', 'bikedetails.bd_image', 'bikedetails.bike_name', 'bikedetails.brand_name']);

        if (count($booking) > 0) {
            return $booking;
        } else {
            return ['message' => 'Booking details not found'];
        }
    }
    public function updateBikeStatus(Request $request)
    {
       
        if(Booking::Where('booking_id',$request->bookingid)->update(['status'=>$request->status])){
            return  ['success' => true, 'message' => "Booking status Successfully updated"];
        }else{
            return  ['success' => false, 'message' => "Error Occured While Booking Status"];
        }
        

    }

    public function getBooking()
    {
        return Booking::all();
    }

    public function bookBike(Request $request)
    {

        $model = new Booking();
        $model->bd_id = $request->bd_id;
        $model->user_id = $request->user_id;
        $model->from_date = $request->from_date;
        $model->to_date = $request->to_date;
        $model->location = $request->location;
        $model->status = $request->status;

        if ($model->save()) {
            return ['message' => "Bike Booked Successfully"];
        } else {
            return ['message' => "Bike could not be Booked"];
        }
    }

    public function deleteBooking($id){
        $a = Booking::where('booking_id', $id)->delete();
        if($a){
            return ['message'=>'Booking deleted Successfully'];
        }else{
            return ['message'=>'Booking Not Found'];
        }
    }

}
