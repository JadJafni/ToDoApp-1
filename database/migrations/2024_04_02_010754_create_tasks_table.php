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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryID');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('statusID');
            $table->unsignedBigInteger('reminderID')->nullable();
            $table->string('task_title', 255);
            $table->text('notes')->nullable();
            $table->string('tag', 255)->nullable();
            $table->date('due_date')->nullable();
            $table->time('time')->nullable();
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
