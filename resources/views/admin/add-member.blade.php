@extends('admin.layout.master')
@section('Title')
  <h1 align="center" >Add Member</h1>
@endsection

@section('content')
  <table class="table">
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
    <div class="col-12 d-flex justify-content-center pt-5">
      {{ $newUser1->links() }}
    </div>
  </div>
@endsection
