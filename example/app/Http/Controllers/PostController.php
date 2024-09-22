<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function store()
    {
        if (!auth()->id()) {
            return ['success' => false, 'error' => 'unauthorized'];
        }

        if (request()->input('title') && request()->input('title') == '') {
            return ['success' => false, 'error' => 'title is required'];
        }

        if (request()->input('content') && request()->input('content') == '') {
            return ['success' => false, 'error' => 'content is required'];
        }

        if (auth()->user()->role != 'editor') {
            return ['success' => false, 'error' => 'user has no right to add post'];
        }

        $data = ['user_id' => auth()->id(), 'title' => request()->input('title'), 'content' => request()->input('content')];
        $post = Post::create($data);

        return ['success' => true, 'post' => $post];
    }
}
