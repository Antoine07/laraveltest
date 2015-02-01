<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 23/01/15
 * Time: 23:45
 */

class BlogController extends  BaseController{


    public function index()
    {
        $posts = Post::all();

        return View::make('home', compact('posts'));
    }


    public function getUsers()
    {
        $users = User::all();

        return View::make('users', compact('users'));
    }
}