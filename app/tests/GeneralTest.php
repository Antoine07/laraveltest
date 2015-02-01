<?php

class GeneralTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

    }

    public function testDatabaseTesting()
    {
        $post = Post::all();

        //var_dump($post);

        $this->assertEquals(2, $post->count());
    }

    /**
     * @expectedException Illuminate\Database\QueryException
     */
    public function testIfConstrainstKeyWithSQlite()
    {
        $post = new Post;
        $post->user_id = 100;
        $post->save();
    }


    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $crawler = $this->client->request('GET', '/');
        $this->assertTrue($this->client->getResponse()->isOk());
    }


    /**
     * @test test if score attribute to user is correct
     */
    public function testScoreUser()
    {
        $user = new User;
        $user->score = 15;
        $this->assertEquals(150, $user->score);

    }

    /**
     * @test test a redirect after buy something with post method
     */
    public function testRedirectAfterPostBuy()
    {
        $this->call('POST', 'buy');
        $this->assertRedirectedToRoute('home', null, ['flash_message' => 'Foo']);

    }

    /**
     * @test a specific route return view
     */

    public function testIfRouteReturnView()
    {
        $this->call('GET', 'users');
        $this->assertViewHas('users');
    }

    /**
     * @test return a automatic message when
     */

    public function testAutomaticMessageWhenAddPost()
    {
        $post = new Post;
        $post->title = "PHPUnit";
        $post->user_id = 1;
        $this->assertEquals("PHPUnit written buy user_id: 1", $post->meta());

    }

    /**
     * @test is ok to save a post with a good user_id
     */
    public function testSaveAGoodUserIdWithPost()
    {

        $last = Post::all()->count();

        $post = new Post;
        $post->title = 'Un titre';
        $post->user_id = 1;
        $post->save();

        $current = Post::all()->count();

        $this->assertEquals(($last + 1), $current);

    }

    public function testFillBothInputs()
    {
        $input = ['title' => 'un title', 'content' => ''];

        $this->call('POST', 'posts', $input);

        $this->assertRedirectedToRoute('posts.create');
    }

}
