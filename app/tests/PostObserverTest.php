<?php

use Observers\PostObserver;


class PostObserverTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
        Post::boot();
    }

    public function tearDown()
    {
        parent::tearDown();
        Artisan::call('migrate:reset');
    }


    /**
     * @test Init with seeder
     */
    public function testCountInitTagPost()
    {

        $first = Post::find(1)->tag->count_apero;
        $second = Post::find(2)->tag->count_apero;

        $this->assertEquals(1, $first);
        $this->assertEquals(1, $second);

    }

    /**
     * @test add multiple post and increment tags table count_apero
     */
    public function testAddPostObserver()
    {

        foreach (range(0, 10) as $p) {
            Post::create(['title' => 'un titre', 'tag_id' => 1]);
        }

        $this->assertEquals(13, Tag::find(1)->count_apero);

    }

    /**
     * @test add multiple post and deincrement tags table count_apero
     */
    public function testRemovePostObserver()
    {

        // be careful the seeders are inject 2 posts associated tag 1 posts and tags

        foreach (range(0, 10) as $p) {
            Post::create(['title' => 'un titre', 'tag_id' => 1]);
        }

        $this->assertEquals(13, Tag::find(1)->count_apero);

        // be careful method where doesn't work with observer
        //remove 3 posts associated to tag 1

        Post::find(1)->delete();
        Post::find(2)->delete();
        Post::find(3)->delete();

        $this->assertEquals(10, Tag::find(1)->count_apero);

        // remove all posts
        Post::truncate();

        // 3 for tag 1
        foreach (range(0, 2) as $p) {
            Post::create(['title' => 'un titre', 'tag_id' => 1]);
        }

        // 5 at 2
        foreach (range(0, 4) as $p) {
            Post::create(['title' => 'un titre', 'tag_id' => 2]);
        }

        $this->assertEquals(3, Tag::find(1)->count_apero);
        $this->assertEquals(5, Tag::find(2)->count_apero);

    }


}