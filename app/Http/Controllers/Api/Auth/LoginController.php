<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Hash;
use Illuminate\Validation\Rule;
use App\Http\Resources\UserResource;
use Auth;

class LoginController extends Controller
{

    public $secretKey;
    private $fileLocation = 'images/user-images/';

    public function __construct(){
        $this->secretKey = config('credentials.api_key');

    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'secret_key' => [
                'required',
                Rule::in([$this->secretKey]),
            ],
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);


        if ($validator->fails()) {
                return response()->json(['status' => 'failed','message' => $validator->errors()], 200);
        }


    
            $user = User::where('phone', $request->input('phone'))->first();

            if (!$user) {

                $message = [
                    'phone' => ['Login Failed, please check Phone number'],
                    'password' => []
                ];
                return response()->json(['status' => 'failed','message' =>  $message ]);
             }
             if (!Hash::check($request->input('password'), $user->password)) {

                $message = [
                    'phone' => [],
                    'password' => ['Login Failed, please check Password']
                ];
                return response()->json(['status' => 'failed', 'message' =>  $message ]);
             }

                $data = new UserResource($user);

                $message = [
                    'message' => ['User Logged in.']
                ];

                return response()->json(['status'=> 'success', 'message' => $message, 'user' =>  $data], 200);
      
    }
}
