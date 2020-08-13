@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">Update Project</h1>
@endsection

@section('content')
  <form class="" action="{{ route('project.UpDate', ['pid' => $project->id])}}" method="post">
    @csrf
    <div class="form-row border border-dark pl-2 pr-2 pt-2 pb-2 rounded">
      <div class="form-group col-xl-12 col-md-12">
        <input type="text" name="name" value="{{{ $project->name }}}" placeholder="Project Name" class="form-control">
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-xl-12 col-md-12">
        <textarea name="description" rows="5" cols="30" class="form-control" placeholder="Project Description">{{ $project->description }}</textarea>
        @error('description')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-xl-6 col-md-12">
        <label for="" >Start Date of Project</label>
        <input type="date" name="StartDate" value="{{ $project->startdate}}" class="form-control">
        @error('StartDate')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-xl-6 col-md-12">
        <label for="" >Final Date To Complete Project</label>
        <input type="date" name="EndDate" value="{{$project->enddate}}" class="form-control">
        @error('EndDate')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-12">
        <label for="exampleFormControlSelect1">Project Status</label>
        <select class="form-control" id="exampleFormControlSelect1" name="status">
          <option value="0">Incomplete</option>
          <option value="1">Complete</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update Project">
      </div>
    </div>
  </form>
@endsection
