<?php

namespace Repositories;

interface UserRepositoryInterface
{
    function all();
    function find($id);
    function create($input);
}