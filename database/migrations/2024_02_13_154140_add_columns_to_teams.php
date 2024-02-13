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
        Schema::table('teams', function (Blueprint $table) {
            $table->string('main_form'); 
            $table->string('second_form'); 
            $table->string('coach_name');
            $table->string('coach_phone')->unique(); 
            $table->string('coach_email')->unique(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('main_form');
            $table->dropColumn('second_form');
            $table->dropColumn('coach_name');
            $table->dropColumn('coach_surname');
            $table->dropColumn('coach_midname');
            $table->dropColumn('coach_phone');
            $table->dropColumn('coach_email');
        });
    }
};
