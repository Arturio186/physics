<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            /*
            $table->string('main_form');
            $table->string('second_form');
            $table->string('coach_name');
            $table->string('coach_surname');
            $table->string('coach_midname');
            $table->string('coach_phone');
            $table->string('coach_email')->unique();
            */
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('tournament_id');
            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
