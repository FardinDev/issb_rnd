<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-users');
        $this->middleware('permission:add-users', ['only' => ['create','store']]);
        $this->middleware('permission:edit-users', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-users', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $roles = Role::pluck('name','name')->all();

       return view('users.create', compact('roles'));
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


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            "phone" =>  $request->phone,
            "gender" =>  $request->gender == 0 ? 'male' : 'female',
            "dob" =>  $request->dob,
            "designation" =>  $request->designation,
            "works_at" =>  $request->works_at,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('user.index')
            ->with('success','User created successfully');
    }

}
