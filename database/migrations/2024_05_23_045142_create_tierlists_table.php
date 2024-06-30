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
        Schema::create('tierlists', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(true);
			$table->string('name');
			$table->longText('description')->nullable();
            $table->enum('type', ['s', 'a', 'b', 'c'])->default('a');
            $table->enum('type_rank', ['default', 'new', 'rising', 'falling'])->default('default');
            $table->string('tip')->nullable();
            $table->string('stage2')->nullable();
			$table->string('stage3')->nullable();
            $table->string('stage4')->nullable();
			$table->string('thumb')->nullable();
            $table->string('image_team')->nullable();
			$table->unsignedBigInteger('user_id')->nullable()->index();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
		});
        Schema::create('tierlists_champion', function(Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tierlists_id');
            $table->unsignedInteger('champions_id');

            $table->foreign('tierlists_id')
                ->references('id')
                ->on('tierlists')
                ->onDelete('cascade');
            $table->foreign('champions_id')
                ->references('id')
                ->on('champions')
                ->onDelete('cascade');
        });
        Schema::create('tierlists_early', function(Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tierlists_id');
            $table->unsignedInteger('champions_id');

            $table->foreign('tierlists_id')
                ->references('id')
                ->on('tierlists')
                ->onDelete('cascade');
            $table->foreign('champions_id')
                ->references('id')
                ->on('champions')
                ->onDelete('cascade');
        });
        Schema::create('tierlists_item', function(Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tierlists_id');
            $table->unsignedInteger('items_id');

            $table->foreign('tierlists_id')
                ->references('id')
                ->on('tierlists')
                ->onDelete('cascade');
            $table->foreign('items_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
        });
        Schema::create('tierlists_augment', function(Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tierlists_id');
            $table->unsignedInteger('augments_id');

            $table->foreign('tierlists_id')
                ->references('id')
                ->on('tierlists')
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
        Schema::dropIfExists('tierlists');
    }
};
