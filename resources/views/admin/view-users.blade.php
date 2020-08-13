@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">Manage Users</h1>
@endsection

@section('content')
<div>
  <i class="fas fa-search"></i>
  <input class=" w-50" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search your name here" title="Type in a name">

</div>
<table class="table" id="myTable">
    <thead class="thead-dark">
      <tr>
        <th scope="col">User Id</th>
        <th scope="col">User Name</th>
        <th scope="col">User Mail-Id</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)

        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{$user->name}}</td>
            <td>{{ $user->email}}
            </td>
            <td>Admin</td>
            @if ($user->isAdmin == 1)
              <td class="row pr-2">
                <div class="col-xl-3 col-md-6 mb-2">
                    <a style="width:125px" class="btn btn-secondary text-white" role="button" disabled aria-disabled="true"><i class="fas fa-trash-alt"></i> Delete</a>
                </div>
              </td>
            @else
              <td class="row pr-2">
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class=" btn btn-danger" href="{{route('user.delete', ['id' => $user->id])}}" role="button" style="width:125px"><i class="fas fa-trash-alt"></i> Delete</a>
                </div>
              </td>
            @endif
        </tr>
      @endforeach
    </tbody>
  </table>


@endsection