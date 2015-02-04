<?php

/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 02/02/15
 * Time: 12:11
 */
class Tag extends Eloquent
{

    public $timestamps = false;

    protected $fillable = ['name', 'count_apero'];

    public function scopeNames($query)
    {
        return $query->select('name', 'id');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }
}