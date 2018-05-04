<?php

namespace App\Http\Controllers;

use App\UserList;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private function getName()
    {
      if(Auth::user()->name)
      {
        return Auth::user()->name;
      }
      else
      {
        return 0;
      }
    }
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
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        $user = User::where('name',$this->getName())->first();
        $lists = UserList::where('users_id',$user->id)->get();
        $x = [];
        foreach($lists as $list)
        {
          $x[] = $list->title;
        }
          return view('home',['lists'=>$lists]);
     }
}
