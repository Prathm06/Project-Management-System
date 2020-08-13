@extends('user.layout.master')
@section('Title')
  <h1 align="center" class="mt-2 mb-3">Project Details</h1>
@endsection

@section('content')
  @php
    $duedate = $project->enddate;
    $current = \Carbon\Carbon::now()->format('Y-m-d');   
  @endphp
  @if ($duedate > $current)
    @if ($project->status == 0)
    <div class="row">
      <div class="col-lg-6 col-sm-12 col-md-12">
        <p align="center" class="font-weight-bold">Project Information</p>
        <form action="" id="project-details">
          <div class="input-group mb-2 mr-sm-2 border border-dark">
            <div class="input-group-prepend">
              <div class="input-group-text font-weight-bold">Project Name :</div>
            </div>
            <input type="text" class="form-control font-weight-bold" disabled placeholder="" value="{{$project->name}}">
          </div>
          <div class="input-group mb-2 mr-sm-2 border border-dark">
              <div class="input-group-prepend">
                <div class="input-group-text font-weight-bold">Project description :</div>
              </div>
              <input type="text" class="form-control font-weight-bold" disabled placeholder="" value="{{$project->description}}">
          </div>
          <div class="input-group mb-2 mr-sm-2 border border-dark">
              <div class="input-group-prepend">
                <div class="input-group-text font-weight-bold">Project Due Date:</div>
              </div>
              <input type="text" class="form-control font-weight-bold text text-danger" disabled placeholder="" value="{{$project->enddate}}">
          </div>
          <div class="input-group mb-2 mr-sm-2 border border-dark">
              <div class="input-group-prepend">
                <div class="input-group-text font-weight-bold">Project Status :</div>
              </div>
              @if ($project->status == 0)
                  <input type="text" class="form-control font-weight-bold text text-danger" disabled placeholder="" value="Incomplete">
              @else
                  <input type="text" class="form-control font-weight-bold text text-success" disabled placeholder="" value="Complete">
              @endif
          </div>
        </form>
      </div>
  
      <div class="col-lg-6 col-sm-12 col-md-12">
          <p align="center" class="font-weight-bold">Project Member Information</p>
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">User id</th>
                  <th scope="col">User Name</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($projectuser as $user)
                      <tr>
                          <th scope="row">{{$user->id}}</th>
                          <td>{{$user->name}}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
          <div class="row">
              <div class="col-12 d-flex justify-content-center">
                {{ $projectuser->links() }}
              </div>
            </div>
      </div>
      <div class="col-lg-12 col-sm-12 col-md-12">
        <div id="myAlert" class="alert alert-danger collapse">
          <a id="linkClose" href="#" class="close">&times;</a>
          <strong>Sorry</strong> You cannot mark task as complete,if it's not added by you
        </div>
        <p align="center" class="font-weight-bold">Task Information</p>
          <table class="form-group table mt-2">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Task Id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Added By</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($taskarray as $task)
                <tr>
                  <th scope="row">{{$task->id}}</th>
                  <td>{{$task->name}}</td>
                  <td>{{$task->description}}</td>
                  @php
                      $user_id = $task->user_id;
                      $user_name = \App\User::where('id', $user_id)->get('name');
                  @endphp
                  <td>{{$user_name->first()->name}}</td>
                  <td>
                    @if ($duedate > $current)
                      @if ($task->status == 0)
                        @if ($user_id == Auth::user()->id)
                          <a style="width:125px" class="btn btn-success" href="/view-project/{{$task->id}}/complete" role="button">Complete</a>
                        @else
                          <a style="width:125px" class="btn btn-success text-white" role="button" id="btnSubmit">Complete</a>
                        @endif      
                      @else
                        <a style="width:125px" class="btn btn-secondary text-white @if($task->status==1){disabled}@endif" role="button" >Complete</a>
                      @endif
                    @else
                      @if ($task->status == 1)
                        <a style="width:125px" class="btn btn-secondary text-white" role="button" disabled aria-disabled="true">Completed</a>
                      @else
                        <a style="width:125px" class="btn btn-success text-white" role="button" disabled aria-disabled="true">Complete</a>
                      @endif
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="col-12 d-flex justify-content-center pt-2">
              {{ $taskarray->links() }}
            </div>
          </div>
      </div>
    </div>  
    @else
    <div class="row">
      <div class="col-lg-6 col-sm-12 col-md-12">
        <p align="center" class="font-weight-bold">Project Information</p>
        <form action="" id="project-details">
          <div class="input-group mb-2 mr-sm-2 border border-dark">
            <div class="input-group-prepend">
              <div class="input-group-text font-weight-bold">Project Name :</div>
            </div>
            <input type="text" class="form-control font-weight-bold" disabled placeholder="" value="{{$project->name}}">
          </div>
          <div class="input-group mb-2 mr-sm-2 border border-dark">
              <div class="input-group-prepend">
                <div class="input-group-text font-weight-bold">Project description :</div>
              </div>
              <input type="text" class="form-control font-weight-bold" disabled placeholder="" value="{{$project->description}}">
          </div>
          <div class="input-group mb-2 mr-sm-2 border border-dark">
              <div class="input-group-prepend">
                <div class="input-group-text font-weight-bold">Project Due Date:</div>
              </div>
              <input type="text" class="form-control font-weight-bold text text-danger" disabled placeholder="" value="{{$project->enddate}}">
          </div>
          <div class="input-group mb-2 mr-sm-2 border border-dark">
              <div class="input-group-prepend">
                <div class="input-group-text font-weight-bold">Project Status :</div>
              </div>
              @if ($project->status == 0)
                  <input type="text" class="form-control font-weight-bold text text-danger" disabled placeholder="" value="Incomplete">
              @else
                  <input type="text" class="form-control font-weight-bold text text-success" disabled placeholder="" value="Complete">
              @endif
          </div>
        </form>
      </div>
  
      <div class="col-lg-6 col-sm-12 col-md-12">
          <p align="center" class="font-weight-bold">Project Member Information</p>
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">User id</th>
                  <th scope="col">User Name</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($projectuser as $user)
                      <tr>
                          <th scope="row">{{$user->id}}</th>
                          <td>{{$user->name}}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
          <div class="row">
              <div class="col-12 d-flex justify-content-center">
                {{ $projectuser->links() }}
              </div>
            </div>
      </div>
      <div class="col-lg-12 col-sm-12 col-md-12">
            <div class="alert alert-success">
      <strong>Project is completed</strong>, <strong>Hope you will get project as soon as prossible</strong>.
    </div>
        <p align="center" class="font-weight-bold">Task Information</p>
          <table class="form-group table mt-2">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Task Id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Added By</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($taskarray as $task)
                <tr>
                  <th scope="row">{{$task->id}}</th>
                  <td>{{$task->name}}</td>
                  <td>{{$task->description}}</td>
                  @php
                      $user_id = $task->user_id;
                      $user_name = \App\User::where('id', $user_id)->get('name');
                  @endphp
                  <td>{{$user_name->first()->name}}</td>
                  <td>
                    @if ($duedate > $current)
                      @if ($task->status == 0)
                        <a style="width:125px" class="btn btn-secondary text-white" disabled aria-disabled="true">Complete</a>
                      @else
                        <a style="width:125px" class="btn btn-secondary text-white" disabled aria-disabled="true">Completed</a>
                      @endif
                    @else
                      @if ($task->status == 0)
                      <a style="width:125px" class="btn btn-secondary text-white" disabled aria-disabled="true">Complete</a>
                      @else
                        <a style="width:125px" class="btn btn-secondary text-white" disabled aria-disabled="true">Completed</a>
                      @endif
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="col-12 d-flex justify-content-center pt-2">
              {{ $taskarray->links() }}
            </div>
          </div>
      </div>
    </div>  

    @endif
  @else
    <div class="row">
      <div class="col-lg-6 col-sm-12 col-md-12">
        <p align="center" class="font-weight-bold">Project Information</p>
        <form action="" id="project-details">
          <div class="input-group mb-2 mr-sm-2 border border-dark">
            <div class="input-group-prepend">
              <div class="input-group-text font-weight-bold">Project Name :</div>
            </div>
            <input type="text" class="form-control font-weight-bold" disabled placeholder="" value="{{$project->name}}">
          </div>
          <div class="input-group mb-2 mr-sm-2 border border-dark">
              <div class="input-group-prepend">
                <div class="input-group-text font-weight-bold">Project description :</div>
              </div>
              <input type="text" class="form-control font-weight-bold" disabled placeholder="" value="{{$project->description}}">
          </div>
          <div class="input-group mb-2 mr-sm-2 border border-dark">
              <div class="input-group-prepend">
                <div class="input-group-text font-weight-bold">Project Due Date:</div>
              </div>
              <input type="text" class="form-control font-weight-bold text text-danger" disabled placeholder="" value="{{$project->enddate}}">
          </div>
          <div class="input-group mb-2 mr-sm-2 border border-dark">
              <div class="input-group-prepend">
                <div class="input-group-text font-weight-bold">Project Status :</div>
              </div>
              @if ($project->status == 0)
                  <input type="text" class="form-control font-weight-bold text text-danger" disabled placeholder="" value="Incomplete">
              @else
                  <input type="text" class="form-control font-weight-bold text text-success" disabled placeholder="" value="Complete">
              @endif
          </div>
        </form>
      </div>
  
      <div class="col-lg-6 col-sm-12 col-md-12">
          <p align="center" class="font-weight-bold">Project Member Information</p>
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">User id</th>
                  <th scope="col">User Name</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($projectuser as $user)
                      <tr>
                          <th scope="row">{{$user->id}}</th>
                          <td>{{$user->name}}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
          <div class="row">
              <div class="col-12 d-flex justify-content-center">
                {{ $projectuser->links() }}
              </div>
            </div>
      </div>
      <div class="col-lg-12 col-sm-12 col-md-12">
        <div id="myAlert" class="alert alert-danger collapse">
          <a id="linkClose" href="#" class="close">&times;</a>
          <strong>Sorry</strong> You cannot mark task as complete, <strong> As due date of project is over</strong>
        </div>
        <p align="center" class="font-weight-bold">Task Information</p>
          <table class="form-group table mt-2">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Task Id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Added By</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($taskarray as $task)
                <tr>
                  <th scope="row">{{$task->id}}</th>
                  <td>{{$task->name}}</td>
                  <td>{{$task->description}}</td>
                  @php
                      $user_id = $task->user_id;
                      $user_name = \App\User::where('id', $user_id)->get('name');
                  @endphp
                  <td>{{$user_name->first()->name}}</td>
                  <td>
                    @if ($duedate > $current)
                    
                    @else
                      @if ($task->status == 0)
                        <a style="width:125px" class="btn btn-success text-white" id="btnSubmit" role="button" >Complete</a>
                      @else
                        <a style="width:125px" class="btn btn-secondary text-white" disabled aria-disabled="true">Completed</a>
                      @endif
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="col-12 d-flex justify-content-center pt-2">
              {{ $taskarray->links() }}
            </div>
          </div>
      </div>
    </div>  

  @endif
@endsection
