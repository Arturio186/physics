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
        Schema::table('event_days', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->default(1);
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_days', function (Blueprint $table) {
            $table->dropForeign('event_id');
            $table->dropColumn('event_id');
        });
    }
};
