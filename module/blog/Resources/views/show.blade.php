@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <p>Title : {{$post->title}}</p>
        <p> content: </p>
        <p>{{$post->content}}</p>

    </div>
@endsection
