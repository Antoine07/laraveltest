<?php

namespace Repositories\Eloquent;

interface TagRepositoryInterface
{
    function all();
    function find($id);
    function create($input);
}