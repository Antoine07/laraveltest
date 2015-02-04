<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->enum('custom', ['apero', 'post', 'page'])->default('apero');
			$table->string('title', 50);
			$table->text('content');
			$table->string('url_thumbnail');
			$table->enum('status', ['publish', 'unpublish', 'trash'])->default('unpublish');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
