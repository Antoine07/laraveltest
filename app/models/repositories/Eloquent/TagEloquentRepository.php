<?php

namespace Repositories\Eloquent;

use Tag;


class TagRepository implements TagRepositoryInterface
{
    public function all()
    {
        return Tag::all();
    }

    public function find($id)
    {
        return Tag::find($id);
    }

    public function create($input)
    {
        return Tag::create($input);
    }

    public function names()
    {
        return Tag::names();
    }

}
