<?php

use Mockery as m;

class HomeControllerTest extends TestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @test RESTfull home page return method all mockery
     */
    public function testHomeControllerIndex()
    {

        $mock = m::mock('Eloquent', 'Post');
        $this->app->instance('Post', $mock);

        $mock->shouldReceive('all')
            ->once();
        $this->client->request('GET', '/');

        $this->assertViewHas('posts');
    }

}