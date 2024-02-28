<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description');
            $table->enum('level',['first','second','third','fourth','fifth','sixth','seventh']);
            $table->enum('semester',['first','second']);
            $table->enum('units',[0,1,2,3,4]);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
