<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo_path');
            $table->string('short_description');
            $table->decimal('price');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerces');
    }
};
