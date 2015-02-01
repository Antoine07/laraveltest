<?php


class Post extends Eloquent
{
    protected $fillable = ['title', 'content', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo('User');
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