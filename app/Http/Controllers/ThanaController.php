<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thana;

class ThanaController extends Controller
{
    public function importThana(){
        if (($handle = fopen(public_path() . '\files\thana.csv', 'r')) !== false) {

            $i = 0;
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {

                if($i>0){

                    $thana = new Thana();
                    $thana->unique_id = $data[0];
                    $thana->name = $data[1];
                    $thana->parent =  $data[2];
                    $thana->isEnabled =  $data[3] === 'TRUE' ? true : false;
                    $thana->save();
                    echo $i.' done <br>';
       
                }

                $i++;
            }
            fclose($handle);
   
        }

    }


    public function thanaUsers(){
        $thana = thana::find(5);
    
    dd($thana->users);
    }
}
