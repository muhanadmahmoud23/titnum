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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('coach_id');
            $table->foreign('coach_id')->references('id')->on('coaches');
            $table->string('day');
            $table->time('session_time');
            $table->string('duartion');
            $table->date('applicable_from');
            $table->date('applicable_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
