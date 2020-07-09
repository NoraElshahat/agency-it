<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function users()
    {
        $all = User::all();
        return view('allusers',['users' => $all]);
    }
    public function makeAdmin($id)
    {
        $find_user = User::find($id);
        //dd($find_user);
        if($find_user){
            $find_user->adminRole = 1 ;
            $find_user->save();
        }

        return back();
    }
}
