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
        Schema::create('sub_tasks', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedInteger('statusID');
            $table->unsignedInteger('taskID');
            $table->string('title', 255);
            $table->timestamps();
            
            $table->foreign('statusID')->references('id')->on('status');
            $table->foreign('taskID')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_tasks');
    }
};