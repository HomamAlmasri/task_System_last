<?php

use App\Models\User;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('employer_name');
            $table->decimal('time_expected');
            $table->string('tag');
            $table->integer('counter')->default(0);
            $table->string('project')->nullable();
            $table->string('feature')->nullable();
            $table->string('note')->nullable();
            $table->string('priority')->nullable();
            $table->tinyInteger('progamming')->default(0);
            $table->tinyInteger('testing')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('time_taken')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
