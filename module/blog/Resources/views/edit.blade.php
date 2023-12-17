@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-body">
                        <form action="{{ route('posts.update',$post->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="title" value="{{old('title',$post->title)}}" name="title" type="text" placeholder="Post title" />
                                <label for="title"> Post title</label>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <textarea  id="content" class="form-control" rows="30" name="content">{{old('content',$post->content)}}</textarea>
                                <label for="title"> Post content</label>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check mb-3">
                               <button class="btn btn-primary" type="submit"> save</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
