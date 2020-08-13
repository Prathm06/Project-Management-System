@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">Manage Project</h1>
@endsection

@section('content')
  <div class="row " style="margin-left:15px">
    @foreach ($projects as $project) 
    <div class="col-lg-4 col-sm-12 col-md-6">
      <div class="card  mr-2 ml-2 mb-3 border border-dark" >
        <!-- Card image -->
        <div class="view overlay">
          <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/photo9.jpg" alt="Card image cap">
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <!-- Card content -->
        <div class="card-body">
          <!-- Title -->
          <a href="/manageproject/view/{{$project->id}}" id="hoveranchor">{{ $project->name }}</a>
          <hr>
          <!-- Text -->
          <p class="card-text">{{$project->description}}</p>
          @if ($project->status == 0)
            <p class="text text-danger font-weight-bold">{{ "Incomplete" }}</p>
          @else
            <p class="text text-success font-weight-bold">{{ "Complete" }}</p>
          @endif
          <div class="row">
            <div class="col-6 mb-2 ">
              <a class=" btn btn-warning btn-md" href="{{route('project.update', ['id' => $project->id])}}" role="button" style="width:110px"><i class="fas fa-edit"></i>Update</a>
            </div>
            <div class="col-6 mb-2">
              <a class=" btn btn-success btn-md" href="{{route('project.addMember', ['id' => $project->id])}}" role="button" style="width:110px"><i class="fas fa-user-plus"></i> Member</a>
            </div>
            <div class="col-6 mb-2">
              <a class=" btn btn-danger btn-md" href="{{route('project.removeMember', ['id' => $project->id])}}" role="button" style="width:110px"><i class="fas fa-user-times"></i> Member</a>
            </div>
            <div class="col-6 mb-2">
              <a class=" btn btn-dark btn-md" href="{{route('admin.delete', ['id' => $project->id])}}" role="button" style="width:110px"><i class="fas fa-trash-alt"></i> Delete</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  </div>
  <!-- Card --><!-- Card -->
@endsection
{{-- <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Project Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($projects as $project)
      <tr>
        <th scope="row">{{ $project->id }}</th>
        <td><a href="/manageproject/view/{{$project->id}}">{{ $project->name }}</a></td>
        <td>
          @if ($project->status == 0)
            {{ "Incomplete" }}
          @else
            {{ "Completed" }}
          @endif
        </td>
        <td class="row pr-2">
          <div class="col-xl-3 col-md-6 mb-2">
            <a class=" btn btn-warning" href="{{route('project.update', ['id' => $project->id])}}" role="button" style="width:125px"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
          </div>
          <div class="col-xl-3 col-md-6 mb-2">
            <a class=" btn btn-success" href="{{route('project.addMember', ['id' => $project->id])}}" role="button" style="width:125px"><i class="fa fa-plus" aria-hidden="true"></i> Member</a>
          </div>
          <div class="col-xl-3 col-md-6 mb-2">
            <a class=" btn btn-danger" href="{{route('project.removeMember', ['id' => $project->id])}}" role="button" style="width:125px"><i class="fa fa-minus" aria-hidden="true"></i> Member</a>
          </div>
          <div class="col-xl-3 col-md-6 mb-2">
            <a class=" btn btn-dark" href="{{route('admin.delete', ['id' => $project->id])}}" role="button" style="width:125px"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table> --}}
