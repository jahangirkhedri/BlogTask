@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Posts</h1>

        <div class="card mb-4">

            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">status</th>
                        <th scope="col">user</th>
                        @can('admin')
                        <th scope="col">change Status</th>
                        @endcan
                        <th scope="col">actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->status_name}}</td>
                            <td>{{$post->user->name}}</td>
                            @can('admin')
                            <td>
                                <a href="{{route('posts.changeStatus',$post->id)}}">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </td>
                            @endcan
                            <td>
                                @can('author')
                                    <a href="{{route('posts.edit',$post->id)}}"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('posts.show',$post->id)}}"><i class="fa fa-eye"></i></a>
                                @endcan


                                    @can('admin')
                                        <form action="{{route('posts.destroy',$post->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm delete" id="delete"><i
                                                    class="fa fa-trash danger"></i></button>
                                        </form>
                                    @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                {{$posts->render()}}
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
