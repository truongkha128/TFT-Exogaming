<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
		Schema::create('pages', function(Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->string('slug')->nullable();
			$table->longText('description')->nullable();
			$table->longText('content')->nullable();
			$table->string('thumb')->nullable();
			$table->unsignedBigInteger('user_id');
            $table->unsignedInteger('website_id');
			$table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('website_id')
                ->references('id')
                ->on('websites')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}
};
