<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;

class MemberController extends Controller
{
    public function add($pid,$uid){
      $project = Project::find($pid);
      $user = User::findOrFail($uid);
      $project->users()->syncWithoutDetaching($user);
      return back()->with('status', 'Member Added Successfully!!');
    }
    public function remove($pid,$uid){
      $project = Project::find($pid);
      $user = User::findOrFail($uid);
      $project->users()->detach($user);
      return back()->with('remove', 'Member Removed Successfully!!');
    }


      public function Update(Request $request, $pid){

        $project = Project::findOrFail($pid);
        $request->validate([
          'name' => 'required',
          'description' => 'required',
          'StartDate' => 'required|date',
          'EndDate' => 'required|date'
        ]);
          $project->status = $request->status;
          $project->name = $request->name;
          $project->description = $request->description;
          $project->startdate = $request->StartDate;
          $project->enddate = $request->EndDate;

        $project->save();
        return redirect('/manageProject')->with('status', 'Project Updated Successfully!!');

      }
}
