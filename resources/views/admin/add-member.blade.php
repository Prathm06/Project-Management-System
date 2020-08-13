@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">Add Member</h1>
@endsection

@section('content')
<div>
  <i class="fas fa-search"></i>
  <input class=" w-50"type="text" id="myInput" onkeyup="myFunction()" placeholder="Search your name here" title="Type in a name">
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
      @foreach ($newUser1 as $user)
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>
            <a class="btn btn-success" href="{{route('member.add', ['pid' => $project->id, 'uid' => $user->id])}}" role="button">Add</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row">
    <div class="col-12 d-flex justify-content-center pt-3">
      {{ $newUser1->links() }}
    </div>
  </div>
  <div>
    <a id="removeMem" class="btn btn-danger" href="{{route('project.removeMember', ['id' => $project->id])}}" role="button"><i class="fas fa-user-slash"></i> Remove Member</a>
    <a id="removeMem" class="btn btn-secondary" href="{{ route('admin.Manageproject') }}" role="button"><i class="fas fa-hand-point-left"></i> Back</a>
  </div>
@endsection
