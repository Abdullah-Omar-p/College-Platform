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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->restrictOnDelete();
            // .. control member who add it .. >>

            $table->integer('grade');
            $table->string('course_name');
            $table->enum('level',['first','second','third','fourth','fifth']);
            $table->enum('semester',['first','second']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
