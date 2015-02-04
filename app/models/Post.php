<?php

use Observers\PostObserver;

class Post extends Eloquent
{
    protected $fillable = ['title', 'content', 'status', 'user_id', 'tag_id'];

    public static function boot()
    {
        parent::boot();
        Post::observe(new PostObserver());
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function tag()
    {
        return $this->belongsTo('Tag');
    }

    public function meta()
    {
        return sprintf(
            '%s written buy user_id: %d',
            $this->title,
            $this->user_id
        );
    }

    public function getRules()
    {
        return [
            'title' => 'required',
            'content' => 'required'
        ];
    }

}