<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('actor_movies', function (Blueprint $table) {
           $table->unsignedBigInteger('actor_id');
           $table->foreign('actor_id')->references('id')->on('actors');
           $table->unsignedBigInteger('movie_id');
           $table->foreign('movie_id')->references('id')->on('movies');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actor_movie');
    }
};
