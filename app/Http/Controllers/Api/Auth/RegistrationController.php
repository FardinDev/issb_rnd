<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Hash;
use Illuminate\Validation\Rule;
use App\Http\Resources\UserResource;

class RegistrationController extends Controller
{
    public $secretKey;
    private $fileLocation = 'images/user-images/';

    public function __construct(){
        $this->secretKey = config('credentials.api_key');

    }

    public function register( Request $request){


        $validator = Validator::make($request->all(), [
            'secret_key' => [
                'required',
                Rule::in([$this->secretKey]),
            ],
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'email|unique:users',
            'password' => 'required|min:6',
        ]);


        if ($validator->fails()) {
                return response()->json(['status' => 'failed','message' => $validator->errors()], 200);
            }
        
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email') ? $request->input('email') : null,
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender') ? $request->input('gender') : null,
                'dob' => $request->input('dob') ? $request->input('dob') : null,
                'password' => $request->input('password') ? Hash::make($request->input('password')) : Hash::make('secret'),
                'remember_token' => str_random(10),
                'active' => 1

            ];

            $user = User::create($data);

            $user->assignRole('app user');
            
            $user = new UserResource($user);
             $message = [
                'message' => ['User created.']
            ];

            return response()->json(['status' => 'success', 'message' => $message, 'user' =>  $user], 200);

    }
}
