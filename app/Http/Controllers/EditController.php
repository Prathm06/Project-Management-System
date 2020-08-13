<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    //
    public function userUpdate(Request $request, $id){
        $user = User::findOrFail($id);
        $request->validate([
          'name' => 'required',
          'email' => 'required|email'
        ]);
          $user->name = $request->name;
          $user->email = $request->email;
          $user->save();
        return redirect()->route('home')->with('status', 'User Details Updated Successfully!!');
    
    }

    public function delete($id){
      $user = User::findOrFail($id);
      $user->delete();
      return redirect()->route('admin.user-details')->with('remove', 'User Deleted Successfully!!');
    }
}
