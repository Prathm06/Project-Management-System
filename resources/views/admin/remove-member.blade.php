@extends('admin.layout.master')
@section('Title')
  <h1 align="center">Remove Member</h1>
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
    <div class="col-12 d-flex justify-content-center pt-5">
      {{ $newUser2->links() }}
    </div>
  </div>
@endsection
