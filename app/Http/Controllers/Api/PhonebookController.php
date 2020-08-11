<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
Use App\Thana;
Use App\ThanaUser;
use App\Http\Resources\PhonebookResource;
use Validator;
use Illuminate\Validation\Rule;

class PhonebookController extends Controller
{
    public $secretKey;

    public function __construct(){
        $this->secretKey = config('credentials.api_key');
    }



    public function phonebook(Request $request){

        $validator = Validator::make($request->all(), [
            'secret_key' => [
                'required',
                Rule::in([$this->secretKey]),
            ],
            ]);


            if ($validator->fails()) {
                return response()->json(['status' => 'failed','message' => $validator->errors()], 200);
            }


            $thanas = Thana::with(['users' => function ($q) {
                $q->where('level', '<', 4);
            }])
            ->get();
            $phonebook = PhonebookResource::collection( $thanas );

            return response()->json(['status' => 'success','phonebook' => $phonebook]);

    }
}
