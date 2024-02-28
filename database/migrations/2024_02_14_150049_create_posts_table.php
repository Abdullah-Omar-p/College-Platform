<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void         // .. this can have too many media files ..
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('body');

            $table->unsignedBigInteger('prof_id');  
            $table->foreign('prof_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
