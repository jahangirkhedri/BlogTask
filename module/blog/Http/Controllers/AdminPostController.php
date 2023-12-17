<?php

namespace Module\blog\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminPostController extends Controller
{
    public function destroy($id)
    {
        $this->postService->delete($id);

        return back()->with('success', 'Post deleted successfully!');
    }

}
