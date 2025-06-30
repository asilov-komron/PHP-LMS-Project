<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->text('content'); // the student's answer
            $table->unsignedInteger('points')->nullable(); // null = not yet evaluated
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // the student
            $table->foreignId('task_id')->constrained()->onDelete('cascade'); // the task
            $table->timestamps(); // includes created_at = submission date, updated_at = eval date
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solutions');
    }
};
