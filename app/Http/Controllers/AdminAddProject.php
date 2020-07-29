<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;

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

}
