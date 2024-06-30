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
        Schema::create('champions', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(true);
			$table->string('name');
			$table->longText('description')->nullable();
			$table->longText('content')->nullable();
			$table->string('thumb')->nullable();
            $table->string('thumbnail')->nullable();
			$table->unsignedBigInteger('user_id')->nullable()->index();
            $table->timestamps();
			$table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
		}); 
        Schema::create('champions_item', function(Blueprint $table) {
            $table->id();
            $table->unsignedInteger('champions_id');
            $table->unsignedInteger('items_id');
            $table->foreign('champions_id')
                ->references('id')
                ->on('champions')
                ->onDelete('cascade');
            $table->foreign('items_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
        });
        Schema::create('champions_trait', function(Blueprint $table) {
            $table->id();
            $table->unsignedInteger('champions_id');
            $table->unsignedInteger('traits_id');
            $table->foreign('champions_id')
                ->references('id')
                ->on('champions')
                ->onDelete('cascade');
            $table->foreign('traits_id')
                ->references('id')
                ->on('traits')
                ->onDelete('cascade');
        });
        Schema::create('champions_augment', function(Blueprint $table) {
            $table->id();
            $table->unsignedInteger('champions_id');
            $table->unsignedInteger('augments_id');
            $table->foreign('champions_id')
                ->references('id')
                ->on('champions')
                ->onDelete('cascade');
            $table->foreign('augments_id')
                ->references('id')
                ->on('augments')
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
        Schema::dropIfExists('champions');
    }
};
