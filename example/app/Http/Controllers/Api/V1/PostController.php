<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request): StorePostResource
    {
        $post = auth()->user()->posts()->create($request->validated());

        return new StorePostResource($post);
    }

    // Other methods...
}
