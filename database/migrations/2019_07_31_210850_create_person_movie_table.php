<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonMovieTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('person_movie', function (Blueprint $table) {
            $table->unsignedInteger('person_id');
            $table->unsignedInteger('movie_id');
            $table->primary(['person_id', 'movie_id']);
        });
    }
}
