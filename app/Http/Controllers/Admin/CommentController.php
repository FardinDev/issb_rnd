<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use Auth;
use App\Comment;
use App\Post;
use Faker\Generator as Faker;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(Faker $faker ,Request $request, $id)
    {
        $data = [];
        $data['unique_id'] = $faker->uuid;
        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $id;
        $data['location'] = '';
        $data['comment'] = $request->comment;

        $comment = Comment::create($data);
        $post = Post::with('user')->find($id);

        $msg = $this->notify($post->user->id, $post->id, $request->comment);

        if($msg->message_id){
            
            return ['msg' => $msg, 'comments' => CommentResource::collection( $post->comments )];
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notify($id, $postId, $comment)
    {
        $fields = array(
            'to' => '/topics/BDPOLICE_'.$id,
            'data' => array(
                "post_id" => $postId,
                "comment" => $comment,
            ),
            'content_available' => true,
            'priority' => 'high',
        );

        
        $fields = json_encode($fields);
		
        $headers = array(
            'Authorization: key=AIzaSyAW9eHajHVyV2G4NsXEhJNHqMLfxbcVQew',
            'Content-Type: application/json',
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $result = json_decode($result);

        // if (curl_errno($ch)) {
        //     // echo "failed fcm error".curl_error($ch);
        //     $message = [
        //         'message' => "failed fcm error" . curl_error($ch),
        //     ];
	

           
        // } else {
        //     $message = [
        //         'message' => "successfully sent!!",
        //         'response' => $result,
        //     ];
			

        //     return response()->json(['status' => 'success', 'data' => $message]);
        // }
		 		

        curl_close($ch);
        return $result;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
