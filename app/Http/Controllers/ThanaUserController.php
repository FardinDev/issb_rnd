<?php

namespace App\Http\Controllers;

use App\ThanaUser;
use App\User;
use App\Thana;
use Illuminate\Http\Request;

class ThanaUserController extends Controller
{
    public function __construct()
    {
        ini_set('max_execution_time', 2000);
    }
   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeRealation()
    {
          // Get the contents of the JSON file 
    $url = public_path() . '\files\police.json';
    $polices = file_get_contents($url);
    $polices = json_decode($polices, true);
    
    $polices = $polices['data'];
    $i = 0;
    foreach ($polices as $police) {
        if(array_key_exists('thanas', $police)){


            $thanas = $police['thanas'];

            foreach($thanas as $thana){

             $destThana = Thana::where('unique_id', $thana)->first();
             $destUser = User::where('phone', $police['mobileNo'])->first();
             if($destThana && $destUser){
                $data = [];
                $data['user_id'] = $destUser->id;
                $data['thana_id'] = $destThana->id;


                ThanaUser::create($data);
                echo ++$i. '<br>';

             }
            }

        }
    
    }
echo $i;
    
    }

  
}
