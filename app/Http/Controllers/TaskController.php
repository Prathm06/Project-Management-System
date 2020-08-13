<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Carbon\Carbon;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TaskNotification;
use Illuminate\Support\Facades\Session;


class TaskController extends Controller
{
    //
    public function store(Request $request){

      $request->validate([
        'name' => 'required|unique:tasks',
        'description' => 'required',
      ]);

      $task = Task::create([
        'name' => $request->name,
        'description' => $request->description,
        'project_id' => $request->project_id,
        'user_id' => Auth::user()->id,
      ]);


      // $user = User::where('isAdmin','1')->get();
      // Notification::send($user, new TaskNotification($task));

      $notifications = Notification::create([
        'name' => $task->name,
        'project_id' => $task->project_id,
        'user_id' => $task->user_id,
      ]);
      return redirect('/home')->with('status', 'Task Added Successfully!!');
      

    }

    public function complete(Task $taskId){

      $taskId->status = 1;
      $taskId->completed_at = now();
      $taskId->save();
      return redirect()->back()->with('status', 'Task Mark As Completed!!');

    }

    public function shownotification(){
      $notifications = Notification::where('status', 0)->get();

      return view('admin.notification', compact('notifications'));
    }

    public function markread($id){
      
      $notification = Notification::find($id);
      $notification->update([
        'status' => 1,
      ]);

      return redirect()->route('admin.notification');
    }
    



}
