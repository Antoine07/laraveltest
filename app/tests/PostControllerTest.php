<?php

class PostControllerTest extends TestCase
{

    protected $mock;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
        $this->mock = Mockery::mock('Eloquent', 'Post');

    }

    public function tearDown()
	{
		parent::tearDown();
		Artisan::call('migrate:reset');
		Mockery::close();
	}

    public function testFilePut()
    {
        File::shouldReceive('put')->once();
        $this->call('GET', 'file');
    }


    /**
     * @test RESTfull controller PostController
     */

    public function testPostControllerIndex()
    {

        $this->mock->shouldReceive('all')
            ->once();

        $this->app->instance('Post', $this->mock);

        $this->call('GET', 'posts');

        $this->assertViewHas('posts');
    }

    /**
     * @test RESTFull store and redirect to posts route
     */

    public function testStoreSuccess()
    {

        $input = ['title' => 'PHP', 'content'=>'blabla'];


        $this->mock->shouldReceive('create')
            ->once()
            ->with($input);

        $this->app->instance('Post', $this->mock);

        $this->call('POST', 'posts', $input);

        $this->assertRedirectedToRoute('posts.index', null, ['message' => 'Your post has been created']);
    }


    /**
     * @test RESTFull store and redirect to posts route
     */

    public function testStoreFails()
    {

        $input = ['title' => ''];

        $this->app->instance('Repositories\PostRepositoryInterface', $this->mock);

        $this->call('POST', 'posts', $input);

        $this->assertRedirectedToRoute('posts.create');
        $this->assertSessionHasErrors(['title']);
    }

    /**
     * @test crawler the DOM with index view RESTFull
     */

    public function testIndexCrawler()
    {

        $crawler = $this->client->request('GET', 'posts');

        $h2 = $crawler->filter('h2:contains("Title:")');

        $this->assertEquals(2, count($h2));
    }

    /**
     * @test crawler into the list
     */

    public function testCrawlerListValue()
    {
        $crawler = $this->client->request('GET', 'posts');
        $item = $crawler->filter('ul.tasks li');

        $task = $item->each(function($node, $ind){
            return $node->text();
        });

        $expected = ['voir la boutique', 'voir la tour Eifel', 'aller se coucher'];

        foreach($task as $text)
        {
            $this->assertEquals(array_shift($expected), $text);
        }

    }




}