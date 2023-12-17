@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ul class="mb-4">
            <li class="active">Name : {{$user->name}}</li>
            <li class="active">Email : {{$user->email}}</li>
            <li class="active">Role : {{$user->role_names}}</li>
        </ul>


    </div>
@endsection
