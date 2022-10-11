<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;

class UserDetailController extends Controller
{
    //
    public function getUserDetail()
    {
        return UserDetail::all();
    }
    public function getUserDetailsById($id){
        $userdetails = UserDetail::where(['u_id' => $id])->get();
        return $userdetails;
    }

    public function saveUserDetails(Request $request){
        if ($docFront = $request->file('docFront') && $docBack = $request->file('docBack')) {
            $docFront = $request->docFront->store('public/documents');
            $docBack = $request->docBack->store('public/documents');

            $model = new UserDetail();
            $model->user_name = $request->name;
            $model->user_phone = $request->phone;
            $model->user_address = $request->address;
            $model->user_gender = $request->gender;
            $model->u_id = $request->userid;
            $model->status = $request->status;
            $model->user_emergency_name = $request->user_emergency_name;
            $model->user_emergency_contact = $request->user_emergency_contact;
            $model->doc_type = $request->doc_type;
            $model->doc_front = $docFront;
            $model->doc_back = $docBack;
            if ($model->save()) {
                return ['message' => "User details added Successfully"];
                // 'userimage' => Storage::disk('public')->url($userimage),
                // 'docfront' => Storage::disk('public')->url($docFront),
                // 'docback' => Storage::disk('public')->url($docBack)];
            } else {
                return ['message' => "User details not be created"];
            }
        }else{
            return ['success' => false,
            'message' => 'File not found in request',
        ];
    }
    
}
}
