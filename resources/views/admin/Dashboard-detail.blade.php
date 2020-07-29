@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-5 mb-5">Main Dashboard</h1>
@endsection

@section('content')
  <div class="row d-flex justify-content-center">
    <div class="card text-white bg-primary mb-3 mr-3 ml-3 mt-3 col-xl-4 col-sm-12 " style="max-width: 13rem;background-image: linear-gradient(to right, blue , lightblue);">
      <div class="card-header text-uppercase" style="font-size:20px; font-weight:500 ">users</div>
      <div class="card-body">
        <h5 class="card-title" style="font-size:40px;">{{ $user }}</h5>
        <p class="card-text text-white text-uppercase" style="font-weight:900">registered</p>
      </div>
    </div>
    <div class="card text-white bg-warning mb-3 mr-3 ml-3 mt-3 col-xl-4 col-sm-12" style="max-width: 13rem; background-image: linear-gradient(to right, orange , yellow);">
      <div class="card-header text-uppercase" style="font-size:20px; font-weight:500 ">projects</div>
      <div class="card-body">
        <h5 class="card-title" style="font-size:40px;">{{ $project }}</h5>
        <p class="card-text text-white text-uppercase" style="font-weight:900">created</p>
      </div>
    </div>
    <div class="card text-white bg-success mb-3 mr-3 ml-3 mt-3 col-xl-4 col-sm-12" style="max-width: 13rem; background-image: linear-gradient(to right, green , lightgreen);">
      <div class="card-header text-uppercase" style="font-size:20px; font-weight:500 ">completed</div>
      <div class="card-body">
        <h5 class="card-title" style="font-size:40px;">{{ $project_completed }}</h5>
        <p class="card-text text-white text-uppercase" style="font-weight:900">projects</p>
      </div>
    </div>
  </div>

  {{-- {{ $user }}
  {{ $project }}
    {{ $project_completed }} --}}
@endsection
