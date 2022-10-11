<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // for login
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // print_r($data);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['This crendentials do not match our record.']
            ], 404);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function register(Request $request)
    {
        $model = new User();
        $model->name = $request->name;
        $model->email = $request->email;

        $model->password = Hash::make($request->password);
        if ($model->save()) {
            return ['message' => "Users created"];
        } else {
            return ['message' => "user not created"];
        }
    }

    public function getUsers($id)
    {
        return User::find($id);
    }
}
