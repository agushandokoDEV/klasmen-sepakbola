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
        Schema::create('skor_pertandingan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('home_club_id');
            $table->foreignUuid('away_club_id');
            $table->integer('home_score')->nullable();
            $table->integer('away_score')->nullable();
            $table->date('match_date')->nullable();
            $table->enum('status_match',['waiting','progress','done'])->default('waiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skor_pertandingan');
    }
};
