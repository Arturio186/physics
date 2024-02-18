<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('team_user', function (Blueprint $table) {
            $table->integer('cought_balls')->default(0);
            $table->integer('falls')->default(0);
            $table->integer('good_shots')->default(0);
            $table->integer('total')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('team_user', function (Blueprint $table) {
            $table->dropColumn('cought_balls');
            $table->dropColumn('falls');
            $table->dropColumn('good_shots');
            $table->dropColumn('total');
        });
    }
};
