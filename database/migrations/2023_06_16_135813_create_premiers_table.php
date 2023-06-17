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
        Schema::create('premiers', function (Blueprint $table) {
            $table->id();
            $table->string('first_week');
            $table->string('city');
            $table->string('formats');
            $table->unsignedBigInteger('premier_id');
            $table->foreign('premier_id')->references('id')->on('premier_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premiers');
    }
};
