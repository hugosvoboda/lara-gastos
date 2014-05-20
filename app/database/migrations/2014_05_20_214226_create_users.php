<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

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
			$table->string('first_name',40);
      $table->string('last_name',30);
      $table->integer('dni')->unique();
      $table->string('user',30);
      $table->string('password');
      $table->string('email',100);
      $table->string('state',20);
      $table->integer('group_id')->unsigned();
      $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
      $table->integer('profile_id')->unsigned();
      $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
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
