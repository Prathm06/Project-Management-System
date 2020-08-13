@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">Add New Project</h1>
@endsection
@section('content')
  <form class="" id="addprpject" action="{{ route('admin.Projectstore')}}" method="post">
    @csrf
    <div class="form-row border border-dark pl-2 pr-2 pt-4 pb-4 rounded" >
      <div class="form-group col-lg-12 col-md-12">
        <input autocomplete="off" type="text" style="border: none; border-bottom:2px black solid; outline:none;background:none;" name="name" value="{{ old('name') }}" placeholder="Project Name" class="form-control">
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-lg-12 col-md-12">
        <input  autocomplete="off" type="text" style="border: none; border-bottom:2px black solid; outline:none;background:none;" name="description" value="{{ old('description') }}" placeholder="Project Description" class="form-control">
        @error('description')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-lg-6 col-md-12">
        <label for="" >Start Date of Project</label>
        <input autocomplete="off" type="date" style="border: none; border-bottom:2px black solid; outline:none;background:none;" name="StartDate" value="{{old('date')}}" class="form-control">
        @error('StartDate')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-lg-6 col-md-12">
        <label for="" >Final Date To Complete Project</label>
        <input type="date" style="border: none; border-bottom:2px black solid; outline:none;background:none;" name="EndDate" value="{{old('date')}}" class="form-control">
        @error('EndDate')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group">
        <input autocomplete="off" type="submit" class="btn btn-primary" value="Create Project">
      </div>
    </div>
  </form>

@endsection
