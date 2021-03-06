<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_id');
            $table->string('title', 100);
            $table->string('description', 4000);
            $table->string('tags', 255);
            $table->string('duration');
            $table->integer('star_one');
            $table->integer('star_two');
            $table->integer('star_three');
            $table->integer('star_four');
            $table->integer('star_five');
            $table->integer('user_id');
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
        Schema::dropIfExists('videos');
    }
}
