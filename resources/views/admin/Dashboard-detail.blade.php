@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">Main Dashboard</h1>
@endsection

@section('content')
  <div class="row d-flex justify-content-center">
    <div class="col-xl-4 col-sm-12">
      <div id="cardanimation" class="card text-dark bg-primary mb-3 mt-3" style="max-width: 13rem;background-image: linear-gradient(to right, #1c92d2 , #ffffff);">
        <div class="card-header text-uppercase" style="font-size:20px; font-weight:500 ">Users</div>
        <div class="card-body">
          <h5 class="card-title" style="font-size:40px;">{{ $user }}</h5>
          <p class="card-text text-dark text-uppercase" style="font-weight:900">registered</p>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-12">
      <div id="cardanimation" class="card text-dark bg-warning mb-3 mr-3 ml-3 mt-3 col-xl-4 col-sm-12" style="max-width: 13rem; background-image: linear-gradient(to right, #fffc00 , #ffffff);">
        <div class="card-header text-uppercase" style="font-size:20px; font-weight:500 ">projects</div>
        <div class="card-body">
          <h5 class="card-title" style="font-size:40px;">{{ $project }}</h5>
          <p class="card-text text-dark text-uppercase" style="font-weight:900">created</p>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-12">
      <div  id="cardanimation" class="card text-dark bg-success mb-3 mr-3 ml-3 mt-3 col-xl-4 col-sm-12" style="max-width: 13rem; background-image: linear-gradient(to right, rgb(80, 190, 80) , #ffffff);">
        <div class="card-header text-uppercase" style="font-size:20px; font-weight:500 ">completed</div>
        <div class="card-body">
          <h5 class="card-title" style="font-size:40px;">{{ $project_completed }}</h5>
          <p class="card-text text-dark text-uppercase" style="font-weight:900">projects</p>
        </div>
      </div>
    </div>
  </div>
  <div id="progressbar">
    <h3>Project Completion</h3>
    <div class="progress" style="height: 30px;">
      @php
          $progress = ($project_completed/$project)*100;
      @endphp
      <div id="proBar"class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{round($progress,0.50)}}%" aria-valuenow="{{round($progress,0.50)}}" aria-valuemin="0" aria-valuemax="100"><span class="font-weight-bold">{{round($progress,0.50)}}% </span></div>
    </div>

  </div>
    
  {{-- {{ $user }}
  {{ $project }}
    {{ $project_completed }} --}}
@endsection
