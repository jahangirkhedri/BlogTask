<?php

namespace Module\blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Module\blog\Contracts\PostServiceInterface;

class PostController extends Controller
{
    public function __construct(private PostServiceInterface $postService)
    {
    }


    public function index()
    {
        $posts = $this->postService->all(Auth::id());
        return view('blog::index', compact('posts'));
    }

    public function create()
    {
        return view('blog::create');
    }

    public function store(Request $request)
    {
        $this->postService->create($request->all());
        return back()->with('success',"Post created successfully!");
    }
    public function show($id)
    {
        $post = $this->postService->getById($id);
        return view('posts.show', compact('post'));
    }


    public function edit($id)
    {
        $post = $this->postService->getById($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->postService->update($id, $request->all());

        return back()->with('success', 'Post updated successfully!');
    }
}
