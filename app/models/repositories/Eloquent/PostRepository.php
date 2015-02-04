<?php

namespace Repositories\Eloquent;

use Post;


class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::all();
    }

    public function find($id)
    {
        return Post::find($id);
    }

    public function create($input)
    {
        return Post::create($input);
    }

    public function user()
    {
        return Post::user();
    }

    public function meta()
    {
        return Post::meta();
    }

    public function getRules()
    {
        return Post::getRules();
    }

}
