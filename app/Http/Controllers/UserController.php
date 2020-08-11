<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use Hash;
class UserController extends Controller
{

    public function __construct()
{
    ini_set('max_execution_time', 300);
}
   


public function userThanas(){
    $user = User::where('phone', '+8801711820509')->first();

dd($user->thanas[0]->name);
}




public function importUser(){
    // Get the contents of the JSON file 
    $url = public_path() . '\files\police.json';
$polices = file_get_contents($url);
$polices = json_decode($polices, true);

$polices = $polices['data'];

foreach ($polices as $police) {
    $data = [];
    $data['name'] = array_key_exists('name', $police) ?  $police['name'] ? $police['name'] : '' : '';
    $data['phone'] = $police['mobileNo'] ? $police['mobileNo'] : '';
    $data['designation'] = $police['designation'] ? $police['designation'] : '';
    $data['works_at'] = $police['workAt'] ? $police['workAt'] : '';
    $data['level'] = $police['level']['numberInt'] ? $police['level']['numberInt'] : 0;
    $data['is_enable'] = $police['isEnable'];
    $data['is_police'] = $police['isPolice'];
    $data['password'] = Hash::make('password');
    $data['remember_token'] = str_random(10);
    $data['active'] = 1;
  
    User::create($data);

}

}
}
