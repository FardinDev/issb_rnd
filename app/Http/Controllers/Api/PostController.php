<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Validation\Rule;
use Webpatser\Uuid\Uuid;
use App\Post;
use App\User;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostListResource;
use App\Events\NewPostAdded;
use App\Notifications\NewPostNotification;
class PostController extends Controller
{
    public $secretKey;
    private $fileLocation = 'images/post-files/';

    public function __construct(){
        $this->secretKey = config('credentials.api_key');
    }

    function generateThumb($type, $original){

       $type  = explode('/', $type )[0];

        if ($type == 'image') {
            return '/images/post-files/'.$original;
        }else if($type == 'video'){
            return 'images/default-video.png'; 
        }else if($type == 'application'){
            return 'images/default-application.png'; 
        }else if($type == 'text'){
            return'images/default-text.png'; 
        }else if($type == 'audio'){
            return'images/default-audio.png'; 
        }
        else{
            return 'images/default.png'; 
        }

    }

    public function create( Request $request ){

        $validator = Validator::make($request->all(), [
            'secret_key' => [
                'required',
                Rule::in([$this->secretKey]),
            ],
            'user_id' => 'required|exists:users,id',
            'thana_id' => 'required|exists:thanas,id',
            'location' => 'required',
            'title' => 'required|max:100',
            'description' => 'required',
            'file' => 'file|max:100000'
            ]);
            
            if ($validator->fails()) {
            return response()->json(['status' => 'failed','message' => $validator->errors()], 200);
            }


            $post = [];
            $post['unique_id'] =  Uuid::generate()->string;
            $post['user_id'] =  $request->input('user_id');
            $post['thana_id'] =  $request->input('thana_id');
            $post['location'] =  $request->input('location');
            $post['title'] =  $request->input('title');
            $post['description'] =  $request->input('description');
            $post['lat'] =  $request->input('lat');
            $post['long'] =  $request->input('long');
            $post['address'] =  $request->input('address');
            $post['priority'] =  '';
            $post['is_confidential'] =  false;
            $post['thumb'] = 'images/default.png';
            
            if ($request->hasFile('file')) {
                
                $file = $request->file('file');
                $fileName = time().'_post_file_.'.$file->getClientOriginalExtension();
                $file->move($this->fileLocation, $fileName);
                $post['thumb'] = $this->generateThumb($file->getClientMimeType(), $fileName);
                $post['file'] = '/images/post-files/'.$fileName;
            }

            $post = Post::create($post);
            $post = new PostResource( $post );

            $message = 'New Post!';

            $user = User::find(25);

            $user->notify(new NewPostNotification($post));

            event(new NewPostAdded($message, $post));
            
            

            return response()->json(['status' => 'success','post' => $post]);
            
    }


    public function findPost( Request $request ){

        $validator = Validator::make($request->all(), [
            'secret_key' => [
                'required',
                Rule::in([$this->secretKey]),
            ],
            'post_id' => 'required|exists:posts,id',
        
            ]);
            
            if ($validator->fails()) {
            return response()->json(['status' => 'failed','message' => $validator->errors()], 200);
            }


            $post = Post::find($request->input('post_id'));
            return response()->json(['status' => 'success','post' => new PostResource( $post )]);
            
    }

    public function getAllPosts( Request $request ){

        $validator = Validator::make($request->all(), [
            'secret_key' => [
                'required',
                Rule::in([$this->secretKey]),
            ],
            ]);
            
            if ($validator->fails()) {
            return response()->json(['status' => 'failed','message' => $validator->errors()], 200);
            }


            $post = Post::latest()->paginate(10);

            $posts =  PostListResource::collection( $post );
            return $posts;
            return response()->json(['status' => 'success', 'posts' =>   $posts ]);
            
    }

    public function getLatest( Request $request ){

        $validator = Validator::make($request->all(), [
            'secret_key' => [
                'required',
                Rule::in([$this->secretKey]),
            ],
            'post_number' => 'required'
            ]);
            
            if ($validator->fails()) {
            return response()->json(['status' => 'failed','message' => $validator->errors()], 200);
            }

            $numberOfPosts = $request->input('post_number');
            $post = Post::latest()->take($numberOfPosts)->get();

            $posts =  PostListResource::collection( $post );
            return $posts;
            return response()->json(['status' => 'success', 'posts' =>   $posts ]);
            
    }


    public function getUserPosts( Request $request ){

        $validator = Validator::make($request->all(), [
            'secret_key' => [
                'required',
                Rule::in([$this->secretKey]),
            ],
            'user_id' => 'required|exists:users,id',
            ]);
            
            if ($validator->fails()) {
            return response()->json(['status' => 'failed','message' => $validator->errors()], 200);
            }
            $userId = $request->input('user_id');
            $post = Post::latest()->where('user_id', $userId)->paginate(10);
            $posts =  PostListResource::collection( $post );
            return $posts;
            return response()->json(['status' => 'success', 'posts' =>   $posts ]);
            
    }
    public function getUserPostsWithComments( Request $request ){

        $validator = Validator::make($request->all(), [
            'secret_key' => [
                'required',
                Rule::in([$this->secretKey]),
            ],
            'user_id' => 'required|exists:users,id',
            ]);
            
            if ($validator->fails()) {
            return response()->json(['status' => 'failed','message' => $validator->errors()], 200);
            }
            $userId = $request->input('user_id');
            $post = Post::latest()
                    ->has('comments')
                    ->where('user_id', $userId)
                    ->paginate(10);
            $posts =  PostListResource::collection( $post );
            return $posts;
            return response()->json(['status' => 'success', 'posts' =>   $posts ]);
            
    }
}
