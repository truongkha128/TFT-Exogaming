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
        Schema::create('tierlists_between', function (Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tierlists_between');
    }
};
