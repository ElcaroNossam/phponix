<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorGenreTable extends Migration
{
    public function up()
    {
        Schema::create('author_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('genre_id');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('author_genre');
    }
}

