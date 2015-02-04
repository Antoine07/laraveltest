<?php

class HomeController extends BaseController {


	protected $post;

	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	public function index()
	{
		$posts =$this->post->all();

		return View::make('home', compact('posts'));
	}

}
