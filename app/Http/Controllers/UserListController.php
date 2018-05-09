<?php

namespace App\Http\Controllers;

use App\UserList;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListController extends Controller
{
    /**
     * create a new list
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createList(Request $request)
    {
      $request->validate([
        'title' => 'required|string|max:191',
      ]);
        $user = User::where('name',Auth::user()->name)->first();
        $list = new UserList;
        $list->title = $request->title;
        $list->users_id = $user->id;
        $list->save();
        return redirect()->route('home');
    }

    public function deletelist(Request $request)
    {
      if($request->delete == '1')
      {
        $userlist = UserList::find($request->id);
        $userlist->delete();
      }
      return redirect()->route('home');
    }

    public function showdeleteConfirmationForm(Request $request)
    {
      $list = UserList::where('id',$request->id)->first();
      return view('userListDeletConfirmeForm',['list'=>$list]);
    }

    public function updatelist(Request $request)
    {
      $request->validate([
        'title' => 'required|string|max:191',
      ]);
      $userlist = UserList::find($request->id);
      $userlist->title = ($request->title);
      $userlist->save();
      return redirect()->route('home');
    }

    public function showUpdateForm(Request $request)
    {
        $userlist = UserList::find($request->id);
        return view('updatelist',['list'=>$userlist]);
    }

    public function showcreateList()
    {
      return view('createlist');
    }
}
