<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->longText('description')->nullable();
			$table->longText('content')->nullable();
			$table->string('thumb')->nullable();
			$table->string('file')->nullable();
			$table->unsignedInteger('category_id')->nullable()->index();
			$table->unsignedBigInteger('user_id')->nullable()->index();
			$table->boolean('active')->default(true);
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
		Schema::drop('news');
	}
};
