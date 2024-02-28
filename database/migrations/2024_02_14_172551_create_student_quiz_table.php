<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_quiz', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id');  
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('quiz_id');  
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');

            $table->integer('grade');
            $table->string('quiz_name');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_quiz');
    }
};
