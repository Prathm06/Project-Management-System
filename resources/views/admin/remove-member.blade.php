@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">Remove Member</h1>
@endsection

@section('content')
<div>
  <i class="fas fa-search"></i>
  <input class=" w-50"type="text" id="myInput" onkeyup="myFunction()" placeholder="Search your name here" title="Type in a name">
  <div>
    <a id="removeMem" class="btn btn-success" href="{{route('project.addMember', ['id' => $project->id])}}" role="button"><i class="fas fa-user-plus"></i> Add Member</a>
    <a id="removeMem" class="btn btn-secondary" href="{{ route('admin.Manageproject') }}" role="button"><i class="fas fa-hand-point-left"></i> Back</a>
  </div>
</div>
  <table class="table" id="myTable">
    <thead class="thead-dark">
      <tr>
        <th scope="col">User Id</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($newUser2 as $user)
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>
            <a class="btn btn-danger" href="{{route('member.remove', ['pid' => $project->id, 'uid' => $user->id])}}" role="button">Remove</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row">
    <div class="col-12 d-flex justify-content-center mt-5">
      {{ $newUser2->links() }}
    </div>
  </div>
@endsection
