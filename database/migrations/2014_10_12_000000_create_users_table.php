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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('surname');
            $table->string('name');
            $table->string('mid_name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('work_space');
=======
            $table->string('surname')->nullable();
            $table->string('name');
            $table->string('mid_name')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('work_space')->nullable();
            $table->string('study_place')->nullable();
            $table->string('photo_path')->nullable();
>>>>>>> misa
            $table->integer('role')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
