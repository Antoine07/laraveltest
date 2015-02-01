<?php

use Repositories\PostRepositoryInterface;

class PostController extends \BaseController
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $posts = $this->post->all();

        return View::make('posts.index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('posts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $input = Input::all();

        $v = Validator::make($input, ['title' => 'required', 'content' => 'required']);

        if ($v->fails()) {
            return Redirect::route('posts.create')
                ->withInput()
                ->withErrors($v->messages())
                ->withFlashMessage('Please fill out both inputs');
        } else {

            $this->post->create($input);

            return Redirect::route('posts.index')->with('message', 'Your post has been created');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
