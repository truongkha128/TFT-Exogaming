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
        Schema::create('augments', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(true);
            $table->string('name');
			$table->longText('description')->nullable();
			$table->longText('content')->nullable();
			$table->string('thumb')->nullable();
            $table->enum('type', ['all', 'tier1', 'tier2', 'tier3'])->default('all');
			$table->unsignedBigInteger('user_id')->nullable()->index();
            $table->timestamps();

			$table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('augments');
    }
};
