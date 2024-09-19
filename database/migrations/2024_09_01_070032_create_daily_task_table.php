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
        Schema::create('daily_task', function (Blueprint $table) {
            $table->id();
            $table->string('project')->nullable();
            $table->string('feature')->nullable();
            $table->string('description');
            $table->string('time_taken');
            $table->date('day');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_task');
    }
};
