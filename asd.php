<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function store(Request $request, string $id): Response
    {
        if ($request->input('title') && $request->input('title') == '') {
            return [
                'success' => false,
                'error' => 'title is required'
            ];
        }

        if ($request->input('content') && $request->input('content') == '') {
            return [
                'success' => false,
                'error' => 'content is required'
            ];
        }

        $user = User::where('id', $id)->find();

        if ($user == null) {
            return [
                'success' => false,
                'error' => 'no user found'
            ];
        }

        $post = Post::create(['user_id' => $id, 'title' => $request->input('title'), 'content' => $request->input('content')]);

        return [
            'success' => false,
            'post' => $post
        ];
    }
}
