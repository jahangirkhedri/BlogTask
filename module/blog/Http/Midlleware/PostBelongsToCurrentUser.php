<?php

namespace Module\blog\Http\Midlleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Module\blog\Repositories\PostRepository;
use Symfony\Component\HttpFoundation\Response;

class PostBelongsToCurrentUser
{
    public function handle(Request $request, Closure $next): Response
    {
        $postId = $request->route('post');
        $post = resolve(PostRepository::class)->find($postId);
        if($post->user_id != Auth::id())
            abort(403);
        return $next($request);
    }
}
