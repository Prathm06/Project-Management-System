@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-5 mb-5">Manage Project</h1>
@endsection

@section('content')
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
      @foreach ($projects as $project)
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
  </table>
@endsection
