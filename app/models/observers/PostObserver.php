<?php

namespace Observers;

class PostObserver
{

    public function saved($post)
    {
        $this->addCountTag($post);
        return true;
    }

    public function created($post)
    {
        $this->addCountTag($post);
        return true;
    }

    public function updated($post)
    {
        $this->addCountTag($post);
        return true;
    }

    public function deleted($post)
    {
        $this->addCountTag($post);
        return true;
    }

    protected function addCountTag($post)
    {
        $post->tag->count_apero = $post->tag->posts()->count();
        $post->tag->save();
    }

}
