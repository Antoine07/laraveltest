<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username', 128);
			$table->string('email', 128)->unique();
			$table->string('password', 100);
			$table->integer('score');
			$table->integer('age');
			$table->enum('role', ['visitor', 'administrator'])->default('visitor');
			$table->enum('status', ['online', 'offline'])->default('offline');
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
		Schema::drop('users');
	}

}
