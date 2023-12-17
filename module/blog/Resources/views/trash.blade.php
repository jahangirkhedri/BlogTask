@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Trash</h1>

        <div class="card mb-4">

            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">status</th>
                        <th scope="col">user</th>
                        <th scope="col">restore</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->status_name}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>
                                <a href="{{route('posts.restore',$post->id)}}"><i class="fa fa-refresh"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
