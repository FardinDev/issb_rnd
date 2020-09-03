<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Candidate;
use App\DataTables\PostsDataTable;
use DataTables;
class CandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:view-users');
        // $this->middleware('permission:add-users', ['only' => ['create','store']]);
        // $this->middleware('permission:edit-users', ['only' => ['edit','update']]);
        // $this->middleware('permission:delete-users', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.candidates.index');
    }


    public function ajax()
    {
        $model = Candidate::with('issb');

        return DataTables::eloquent($model)
        ->orderColumn('id', '-id $1')

        // ->editColumn('thumb', function(Candidate $post) {
        //     return asset($post->thumb);
        // })
        // ->addColumn('comments', function(Candidate $post) {
        //     return count($post->comments);
        // })
        ->addColumn('action', function(Candidate $candidate) {
            return route('candidate.show', $candidate->id);
        })
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.admin.candidates.create');
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'board_no' => ['required'],
            'chest_no' => ['required'],
        ]);


        $params = [
            'user_id' => auth()->user()->id,
            'board_no' => $request->board_no,
            'chest_no' => $request->chest_no,
        ];

        $client = new Client(['base_uri' => 'https://reqres.in/api/']);
        $response = $client->post('users', [
            RequestOptions::JSON => $params,

        ],
            ['Content-Type' => 'application/json']);

        if ($response->getBody()) {
            $contents = json_decode($response->getBody(), true);
            // JSON string: { ... }
        }
        \dd($contents);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'gender' => 'required',
            'password' => 'required|min:6|same:confirm-password',
            'role' => 'required',
        ]);

    }

    public function add()
    {

        $params = [
            'user_id' => auth()->user()->id,
            'secret_key' => 'issb@rnd#2020f@rdin',
            'request_from' => 'rnd',
        ];

        $client = new Client(['base_uri' => 'https://reqres.in/api/']);
        $response = $client->post('users', [
            RequestOptions::JSON => $params,

        ],
            ['Content-Type' => 'application/json']);

        if ($response->getBody()) {
            $contents = json_decode($response->getBody(), true);
            // JSON string: { ... }
        }
        \dd($contents);
    }

}
