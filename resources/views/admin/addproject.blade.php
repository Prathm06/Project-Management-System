@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">Add New Project</h1>
@endsection
@section('content')
  <form class="" action="{{ route('admin.Projectstore')}}" method="post">
    @csrf
    <div class="form-row border border-dark pl-2 pr-2 pt-4 pb-4 rounded" >
      <div class="form-group col-lg-12 col-md-12">
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Project Name" class="form-control">
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-lg-12 col-md-12">
        <textarea name="description" rows="5" cols="30" class="form-control" placeholder="Project Description">{{ old('description') }}</textarea>
        @error('description')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-lg-6 col-md-12">
        <label for="" >Start Date of Project</label>
        <input type="date" name="StartDate" value="{{old('date')}}" class="form-control">
        @error('StartDate')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-lg-6 col-md-12">
        <label for="" >Final Date To Complete Project</label>
        <input type="date" name="EndDate" value="{{old('date')}}" class="form-control">
        @error('EndDate')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Create Project">
      </div>
    </div>
  </form>

@endsection
