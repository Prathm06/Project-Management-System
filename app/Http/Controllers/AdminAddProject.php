<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Project;
use Illuminate\Http\Request;

class AdminAddProject extends Controller
{
  public function adminUpdate(Request $request, $id){

    $user = User::findOrFail($id);
    $request->validate([
      'name' => 'required',
      'email' => 'required|email'
    ]);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();
    return redirect()->route('admin.Dashboard')->with('status', 'Admin Details Updated Successfully!!');

  }
  public function addproject(){
    return view('admin.addproject');
  }

  public function store(Request $request){

    $request->validate([
      'name' => 'required|unique:projects',
      'description' => 'required',
      'StartDate' => 'required|date',
      'EndDate' => 'required|date'
    ]);

    $project = Project::create([
      'name' => $request->name,
      'description' => $request->description,
      'startdate' => $request->StartDate,
      'enddate' => $request->EndDate
    ]);
    return redirect('/dashboard')->with('status', 'Project Created Successfully!!');

  }

  public function manageproject(){
    $projects = Project::all()->paginate(3);
    return view('admin.manageproject', compact('projects'));
  }

  public function delete($id){
    $project = Project::findOrFail($id);
    $project->delete();
    return redirect('/dashboard')->with('remove', 'Project Deleted Successfully!!');
  }

  public function projectview($id){
      $project = Project::findorFail($id);
      $users = $project->users()->get(array('user_id'));
      $arrayName = array();
      foreach ($users as $user) {
        array_push($arrayName,$user->user_id);
      }
      $projectuser = User::whereIn('id', $arrayName)->paginate();

      $tasks = $project->tasks()->get(array('id'));
      $arrayName = array();
      foreach ($tasks as $task) {
        array_push($arrayName,$task->id);
      }
      $projecttask = Task::whereIn('id', $arrayName)->paginate();

      return view('admin.view-project-details', compact('project','projectuser','projecttask'));

  }

}
