<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Post $post): bool
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role === 'editor';
    }

    public function update(User $user, Post $post)
    {
        return $user->role === 'editor' || $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        return $user->role === 'editor' || $user->id === $post->user_id;
    }
}
