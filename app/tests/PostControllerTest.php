<?php

use Mockery as m;

class PostControllerTest extends TestCase
{

    protected $mock;

    public function setUp()
    {
        parent::setUp();

        $this->mock = $this->mock('Post');

    }

    public function tearDown()
    {
        parent::tearDown();
        m::close();

    }

    protected function mock($class)
    {
        $mock = m::mock('Eloquent', $class);
        $this->app->instance($class, $mock);

        return $mock;
    }

    /**
     * @test RESTfull home page return method all mockery
     */

    public function testPostControllerIndex()
    {
        $this->mock->shouldReceive('all')
            ->once();

        $this->call('GET', 'aperos');
        $this->assertViewHas('posts');
    }

    /**
     * @test RESTFull store apero success
     */

    public function testStoreSuccess()
    {

        $input = ['title' => 'PHP', 'content' => 'blabla'];

        $this->mock->shouldReceive('create')
            ->once()
            ->with($input);

        $this->call('POST', 'aperos', $input);
        $this->assertRedirectedToRoute('home', null, ['message' => 'Your post has been created']);
    }


    /**
     * @test RESTFull store and redirect to posts route
     */

    public function testStoreFails()
    {
        $input = ['title' => ''];

        $this->call('POST', 'aperos', $input);
        $this->assertRedirectedToRoute('aperos.create');
        $this->assertSessionHasErrors(['title']);
    }

    /**
     * @test post and send message to administrator id=1 see seeders
     */
    public function testMailerSendWhenPost()
    {
        $input = ['title' => 'PHP', 'content' => 'blabla'];

        $this->mock->shouldReceive('create')
            ->once()
            ->with($input);

        $mock = m::mock('Repositories\UserMailer');
        $this->app->instance('Repositories\UserMailer', $mock);

        $mock->shouldReceive('welcome')->once();

        $this->call('POST', 'aperos', $input);
    }


}