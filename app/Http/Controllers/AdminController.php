<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    // Ajax Controller handling request of admin to get the specified user
    public function findUser()
    {
      $users =  \App\User::all();
      if(request()->ajax())
      {
        // return "123";
          return response()->json($users);
      }
      return "hello from backend";
    }
    
}
