<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewPostAdded;
use App\Notifications\PostCreated;
use Auth;
use App\Notifications\NewPostNotification;
class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getUnreadNotification(){

        $unreadNotifications = auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
        $count = auth()->user()->unreadNotifications()->get()->count();


        return [
            'count' => $count,
            'unread' => $unreadNotifications
        ];
        
    }

    public function notificationPage(){
        return view('notification');
    }


    public function notificationForm(){
        return view('form');
    }

    public function notificationSend(Request $request){

        $byUser = Auth::user();

        $message = $request->message;

        event(new NewPostAdded($message, $byUser));

        // $byUser->notify(new PostCreated());




        return redirect()->back();
    }
}
