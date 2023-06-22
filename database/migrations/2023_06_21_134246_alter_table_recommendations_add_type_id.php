<?php

use App\Models\RECOMMENDATIONTYPES;
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
        Schema::table('recommendations', function (Blueprint $table) {
          $table->unsignedBigInteger('type')->default(RECOMMENDATIONTYPES::MOVIE->value);
          $table->foreign('type')->references('id')->on('recommendation_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
