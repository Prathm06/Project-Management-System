@extends('admin.layout.master')
@section('Title')
  <h1 align="center" class="mt-3 mb-3">Notifications</h1>
@endsection

@section('content')
 
@foreach ($notifications as $notification)
@php
    $user = \App\User::findOrFail($notification->user_id);
    $project = \App\Project::findOrFail($notification->project_id);
@endphp
<div class="alert alert-success " role="alert">
        Task is been created by <strong>{{$user->name}}</strong> for Project <strong>{{$project->name}}</strong>
        <a href="{{route('admin.markAsRead', ['id' => $notification->id ] )}}" class=" font-weight-normal"  style="font-size: large ;float:right;">mark as read</a>
        {{--  --}}
    </div>
@endforeach
@endsection