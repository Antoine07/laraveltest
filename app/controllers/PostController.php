<?php

use Repositories\UserMailer;

class PostController extends \BaseController
{

    protected $post;
    protected $user;
    protected $tag;
    protected $mailer;

    public function __construct(
        Post $post,
        User $user,
        Tag $tag,
        UserMailer $mailer)
    {
        $this->post = $post;
        $this->user = $user;
        $this->tag = $tag;
        $this->mailer = $mailer;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $posts = $this->post->all();

        return View::make('aperos.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags = $this->tag->names()->get();

        $options = [];
        foreach ($tags as $tag) {
            $options[$tag->id] = $tag->name;
        }

        return View::make('aperos.create', compact('options'));
    }


    /**
     * Store a new apero
     *
     * @return Response
     */
    public function store()
    {

        $input = Input::all();

        $v = Validator::make($input, ['title' => 'required', 'content' => 'required']);

        if ($v->fails()) {
            return Redirect::route('aperos.create')
                ->withInput()
                ->withErrors($v->messages())
                ->withFlashMessage('Please fill out both inputs');
        } else {

            $this->post->create($input);

            $user = $this->user->find(1);
            $this->mailer->welcome($user);

            return Redirect::route('home')->with('message', 'Your post has been created');
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
