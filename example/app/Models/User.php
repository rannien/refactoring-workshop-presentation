<?php

class User extends Eloquent
{
    protected $fillable = ['name', 'email', 'password', 'role'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}