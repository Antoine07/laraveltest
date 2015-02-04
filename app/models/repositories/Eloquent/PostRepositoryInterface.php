<?php

namespace Repositories;

interface PostRepositoryInterface
{
    function all();
    function find($id);
    function create($input);
}