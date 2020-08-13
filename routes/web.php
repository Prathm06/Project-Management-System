<?php

use App\Notification;
use Illuminate\Support\Facades\Session;

 use App\Project;
 use App\User;
 use App\Task;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function(){

  Route::get('/home', function(){
    $user = User::findOrFail(Auth::user()->id);
    $projects = $user->projects()->get(array('project_id'));
    $arrayName = array();
    foreach ($projects as $project) {
      array_push($arrayName,$project->project_id);
    }
    $AProject = Project::whereIn('id', $arrayName)->paginate();
    return view('user.view-projects', compact('AProject'));
  })->name('home');

  Route::get('/view-project/{id}',function($id){

    $project = Project::findOrFail($id);

    $users = $project->users()->get(array('user_id'));
    $arrayName = array();
    foreach ($users as $user) {
      array_push($arrayName,$user->user_id);
    }
    $projectuser = User::whereIn('id', $arrayName)->paginate();

    $tasks = $project->tasks()->get(array('id'));
    // return $tasks;
    $arrayName = array();
    foreach ($tasks as $task) {
      array_push($arrayName,$task->id);
    }
    $taskarray = Task::whereIn('id', $arrayName)->paginate();
    return view('user.project-details', compact('project','taskarray','projectuser'));

  })->name('user-project.view');

  Route::get('/edit-profile/{id}', function($id){
    $user = User::findOrFail($id);
    return view('user.edit-profile', compact('user'));
  })->name('edit-profile');
  Route::post('/edit-profile/update/{id}','EditController@userUpdate')->name('user.update');

  Route::get('/add-task',function(){
    $user = User::findOrFail(Auth::user()->id);
    $projects = $user->projects()->get(array('project_id'));
    $arrayName = array();
    foreach ($projects as $project) {
      array_push($arrayName,$project->project_id);
    }
    $AProject = Project::whereIn('id', $arrayName)->paginate();
    return view('user.add-tasks', compact('AProject'));
  })->name('addtask');

  Route::post('/add-task/store','TaskController@store' )->name('user.addTasks');

  Route::get('view-project/{taskId}/complete','TaskController@complete');

});





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
          return view('admin.update-project', compact('project'));

        })->name('project.update');
        Route::get('/manageProject/+member/{id}',function($id){

          $project = Project::findOrFail($id);
          $users = $project->users()->get(array('user_id'));
          $arrayName = array();
          foreach ($users as $user) {
            array_push($arrayName,$user->user_id);
          }
          $newUser1 = User::whereNotIn('id', $arrayName)->paginate();
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
          $newUser1 = User::whereNotIn('id', $arrayName)->paginate();
          $newUser2 = User::whereIn('id', $arrayName)->paginate();
          return view('admin.remove-member', compact('project','newUser2'));

        })->name('project.removeMember');

    Route::get('/manageProject/delete/{pid}','AdminAddProject@delete' )->name('admin.delete');

    Route::post('/manageProject/manage/update/{pid}','MemberController@update' )->name('project.UpDate');
    Route::get('/manageProject/manage/add/{pid}/{uid}','MemberController@add' )->name('member.add');
    Route::get('/manageProject/manage/remove/{pid}/{uid}','MemberController@remove' )->name('member.remove');

    Route::get('/manageproject/view/{pid}', function ($pid) {
      $project = Project::findorFail($pid);

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
    });

    Route::get('notifications', 'TaskController@shownotification')->name('admin.notification');
    Route::get('notifications/read/{id}', 'TaskController@markread')->name('admin.markAsRead');

    Route::get('users-details', function () {
      $users = User::all();
      return view('admin.view-users', compact('users'));
    })->name('admin.user-details');

    Route::get('/users-details/delete/{uid}','EditController@delete' )->name('user.delete');    


});




// Route::get('/test', function () {
//   // $task = Task::create([
//   //   'name' => 'Test Task',
//   //   'description' => 'Test Task Description',
//   //   'project_id' => '1',
//   //   'completed_at' => now(),
//   // ]);
//   // $task->save();
//
//   return $t;
// });
