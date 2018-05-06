<?php

namespace App\Http\Controllers;

use App\Task;
use App\UserList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function showTasks(Request $request)
  {
    $list = UserList::find($request->id);
    $tasks = Task::where('user_lists_id',$list->id)->get();
    return view('tasks',[
      'list'=>$list,
      'tasks'=>$tasks
    ]);
  }

  public function showcreateTaskForm(Request $request)
  {
    $list = UserList::find($request->id);
    return view('createTaskForm',['list'=>$list]);
  }

  public function createTask(Request $request)
  {
    $request->validate([
      'task' => 'required|string|max:191',
    ]);
    $task = new Task();
    $task->text = $request->task;
    $task->user_lists_id = $request->id;
    $task->save();
    return redirect()->route('home');
  }

  public function showupdateTaskForm(Request $request)
  {
    $task = Task::where('id',$request->id)->get();
    return view('taskUpdateForm',['task'=>$task]);
  }

  public function updateTask(Request $request)
  {
    $request->validate([
      'task' => 'required|string|max:191',
    ]);
    $task = Task::where('id',$request->id)->first();
    $task->text = $request->task;
    $task->completed = $request->complete;
    $task->save();
    return redirect()->route('home');
  }

  public function showdeleteConfirmationForm(Request $request)
  {
    $task = Task::where('id',$request->id)->first();
    return view('taskDeleteConfirmForm',['task'=>$task]);
  }

  public function deleteTask(Request $request)
  {
    if($request->delete == '1')
    {
      $task = Task::where('id',$request->id)->first();
      $task->delete();
    }
    return redirect()->route('home');
  }
}
