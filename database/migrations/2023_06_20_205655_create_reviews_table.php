<?php

use App\Models\REPORTED;
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
        Schema::create('reviews', function (Blueprint $table) {
            //Columns
            $table->id();
            $table->integer('rating');
            $table->string('contents');
            $table->integer('likes');
            $table->integer('dislikes');
            $table->integer('votes');
            //Foreign keys
            $table->unsignedBigInteger('reported_by')->default(REPORTED::YES->value);
            $table->foreign('reported_by')->references('id')->on('users');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('reviews');
    }
};
