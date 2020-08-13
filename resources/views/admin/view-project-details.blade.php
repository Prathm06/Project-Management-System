@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">View Project Details</h1>
@endsection

@section('content')
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
              @foreach ($projecttask as $task)
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
                    @if ($task->status == 0)
                      <a  class="text text-danger" disabled aria-disabled="true">Incomplete</a>    
                    @else
                      <a class="text text-success" disabled aria-disabled="true">Completed</a>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="col-12 d-flex justify-content-center pt-2">
              {{ $projecttask->links() }}
            </div>
          </div>
        
    </div>
  </div>
    
@endsection
