@extends('user.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">Add New Task</h1>
@endsection
@section('content')
  @if ($AProject->count())
  <form class="" action="{{ route('user.addTasks')}}" method="post">
    @csrf
    <div class="form-row border border-dark pl-2 pr-2 pt-4 pb-4 rounded" >
      <div class="form-group col-lg-12 col-md-12">
        <input type="text" name="name" style="font-weight : bold;border: none; border-bottom:2px black solid; outline:none;background:none;" value="{{ old('name') }}" placeholder="Task Name" class="form-control">
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-lg-12 col-md-12">
        <input type="text" name="description" style="font-weight : bold;border: none; border-bottom:2px black solid; outline:none;background:none;" value="{{ old('description') }}" placeholder="Task Description" class="form-control">
        @error('description')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
      </div>
      <div class="form-group col-lg-12 col-md-12">
        <label for="exampleFormControlSelect1">Select Project </label>
        <select style="font-weight : bold;border: none; border-bottom:2px black solid; outline:none;background:none;" class="form-control" id="" name="project_id">
        @foreach ($AProject as $project)
          @php
            $duedate = $project->enddate;
            $current = \Carbon\Carbon::now()->format('Y-m-d');   
          @endphp
          @if ($duedate > $current)
            @if ($project->status == 0)
              <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endif
          @endif   
        @endforeach
        </select>
        <br>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Add Task">
      </div>
    </div>
  </form> 
  @else
  
  <div class="alert alert-danger">
    <strong>Sorry!</strong> No Project assigned to you <i class="fa fa-frown-o" aria-hidden="true"></i> <strong>Hope you will get project as soon as prossible</strong>.
  </div>
  @endif

@endsection
