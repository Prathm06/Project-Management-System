<?php

 use App\Project;
 use App\User;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' =>['auth','admin']], function(){
    Route::get('/dashboard', function(){
        $user = User::where('isAdmin', '=', '0')->count();
        $project = Project::count();
        $project_completed = Project::where('status', '=', '1')->count();
        return view('admin.Dashboard-detail',compact('user','project', 'project_completed'));
      })->name('admin.Dashboard');
    Route::get('/editprofile/{id}', function($id){
      $user = User::findOrFail($id);
      return view('admin.edit-profile', compact('user'));
    })->name('admin.editprofile');
    Route::post('/editprofile/update/{id}','AdminAddProject@adminUpdate')->name('admin.update');
    Route::get('/addProject','AdminAddProject@addproject' )->name('admin.Addproject');
    Route::post('/addProject/store','AdminAddProject@store' )->name('admin.Projectstore');
    Route::get('/manageProject',function(){
      $projects = Project::all();
      return view('admin.manageproject', compact('projects'));
    } )->name('admin.Manageproject');
        Route::get('/manageProject/update/{id}',function($id){

          $project = Project::findOrFail($id);
          // $users = $project->users()->get(array('user_id'));
          // $arrayName = array();
          // foreach ($users as $user) {
          //   array_push($arrayName,$user->user_id);
          // }
          // $newUser1 = User::whereNotIn('id', $arrayName)->paginate(6);
          // $newUser2 = User::whereIn('id', $arrayName)->paginate(6);
          return view('admin.update-project', compact('project'));

        })->name('project.update');
        Route::get('/manageProject/+member/{id}',function($id){

          $project = Project::findOrFail($id);
          $users = $project->users()->get(array('user_id'));
          $arrayName = array();
          foreach ($users as $user) {
            array_push($arrayName,$user->user_id);
          }
          $newUser1 = User::whereNotIn('id', $arrayName)->paginate(5);
          // $newUser2 = User::whereIn('id', $arrayName)->paginate(6);
          return view('admin.add-member', compact('project','newUser1'));

        })->name('project.addMember');

        Route::get('/manageProject/-member/{id}',function($id){

          $project = Project::findOrFail($id);
          $users = $project->users()->get(array('user_id'));
          $arrayName = array();
          foreach ($users as $user) {
            array_push($arrayName,$user->user_id);
          }
          $newUser1 = User::whereNotIn('id', $arrayName)->paginate(5);
          $newUser2 = User::whereIn('id', $arrayName)->paginate(5);
          return view('admin.remove-member', compact('project','newUser2'));

        })->name('project.removeMember');

    Route::get('/manageProject/delete/{pid}','AdminAddProject@delete' )->name('admin.delete');

    Route::post('/manageProject/manage/update/{pid}','MemberController@update' )->name('project.UpDate');
    Route::get('/manageProject/manage/add/{pid}/{uid}','MemberController@add' )->name('member.add');
    Route::get('/manageProject/manage/remove/{pid}/{uid}','MemberController@remove' )->name('member.remove');


});

// Route::get('/test', function(){
//   $project = Project::find(1);
//   return $project->users->where('user_id','=', 1);
// });
