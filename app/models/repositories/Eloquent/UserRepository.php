<?php

namespace Repositories\Eloquent;

use User;


class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function create($input)
    {
        return User::create($input);
    }

    public function posts()
    {
        return User::posts();
    }

    public function setScoreAttribute($score)
    {
        return User::setScoreAttribute($score);
    }

    public function getOldest()
    {
        return User::getOldest();
    }

    public function admin()
    {
        return User::admin();
    }

}
