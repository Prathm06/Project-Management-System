@extends('user.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">Manage Project</h1>
@endsection

@section('content')
@if ($AProject->count())
  <div class="row " style="margin-left:15px">
    @foreach ($AProject as $project) 
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
            <a id="hoveranchor">{{ $project->name }}</a>
            <hr>
            <!-- Text -->
            <p class="card-text">{{$project->description}}</p>
            @if ($project->status == 0)
              <p class="text text-danger font-weight-bold">{{ "Incomplete" }}</p>
            @else
              <p class="text text-success font-weight-bold">{{ "Complete" }}</p>
            @endif
            <div class="row">
              <div class="col-6 mb-2">
                <a class=" btn btn-warning" href="{{route('user-project.view', ['id' => $project->id])}}" role="button" style="width:125px"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
 @else
  <div class="alert alert-danger">
    <strong>Sorry!</strong> No Project assigned to you <i class="fa fa-frown-o" aria-hidden="true"></i> <strong>Hope you will get project as soon as prossible</strong>.
  </div>      
@endif

@endsection
{{-- </div>
@if ($AProject->count())
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Project Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($AProject as $project)
      <tr>
        <th scope="row">{{ $project->id }}</th>
        <td>{{ $project->name }}</td>
        <td>
          @if ($project->status == 0)
            {{ "Incomplete" }}
          @else
            {{ "Completed" }}
          @endif
        </td>
        <td class="row pr-2">
          <div class="col-xl-3 col-md-6 mb-2">
            <a class=" btn btn-warning" href="{{route('user-project.view', ['id' => $project->id])}}" role="button" style="width:125px"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
          </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="row">
  <div class="col-12 d-flex justify-content-center">
    {{ $AProject->links() }}
  </div>
</div>
@else
<div class="alert alert-danger">
  <strong>Sorry!</strong> No Project assigned to you <i class="fa fa-frown-o" aria-hidden="true"></i> <strong>Hope you will get project as soon as prossible</strong>.
</div>      
@endif --}}
