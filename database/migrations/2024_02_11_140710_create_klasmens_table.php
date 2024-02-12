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
        Schema::create('klasmen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('club_id');
            $table->integer('total_match')->default(0);
            $table->integer('total_win')->default(0);
            $table->integer('total_draw')->default(0);
            $table->integer('total_lost')->default(0);
            $table->integer('total_goal')->default(0);
            $table->integer('total_point')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasmen');
    }
};
