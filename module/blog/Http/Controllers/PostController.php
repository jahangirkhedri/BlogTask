<?php

namespace Module\blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Module\blog\Contracts\PostServiceInterface;
use Module\blog\Http\Requests\StorePostFormRequest;
use Module\blog\Http\Requests\UpdatePostFormRequest;

class PostController extends Controller
{
    public function __construct(private PostServiceInterface $postService)
    {
    }


    public function index()
    {
        $user = Auth::user();
        if($user->is_admin){
            $posts = $this->postService->all();
        }else{
            $posts = $this->postService->allUSerPosts($user->id);
        }

        return view('blog::index', compact('posts'));
    }

    public function create()
    {
        return view('blog::create');
    }

    public function store(StorePostFormRequest $request)
    {
        try {
            $this->postService->create($request->only(['title','content','user_id']));
            return back()->with('success',"Post created successfully!");
        }catch (\Exception $e){
            return back()->with('error',"Error! something went Wrong");
        }

    }
    public function show($id)
    {
        $post = $this->postService->getById($id);
        return view('blog::show', compact('post'));
    }


    public function edit($id)
    {
        $post = $this->postService->getById($id);
        return view('blog::edit', compact('post'));
    }

    public function update(UpdatePostFormRequest $request, $id)
    {
        try {
        $this->postService->update($id, $request->only(['title','content']));

        return back()->with('success', 'Post updated successfully!');
        }catch (\Exception $e){
            return back()->with('error',"Error! something went Wrong");
        }
    }

    public function destroy($id)
    {
        try {

            $this->postService->delete($id);
            return back()->with('success', 'Post deleted successfully!');

        } catch (\Exception $e) {
            return back()->with('error', "Error! something went Wrong");
        }
    }

    public function trash()
    {
        try {
            $posts = $this->postService->trash();
            return view('blog::trash', compact('posts'));
        } catch (\Exception $e) {
            return back()->with('error', "Error! something went Wrong");
        }
    }

    public function restore($id)
    {
        try {
            $this->postService->restore($id);
            return back()->with('success', 'Post restored successfully!');
        } catch (\Exception $e) {
            return back()->with('error', "Error! something went Wrong");
        }
    }

    public function changeStatus($id)
    {
        try {
            $this->postService->changeStatus($id);
            return back()->with('success', 'Status changed successfully!');
        } catch (\Exception $e) {
            return back()->with('error', "Error! something went Wrong");
        }
    }
}
