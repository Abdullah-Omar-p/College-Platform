<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mediaable', function (Blueprint $table) {
            $table->id();
            $table->string('filename')->nullable();
            $table->integer('mediaable_id');
            $table->string('mediaable_type');
            $table->enum('type',['video','image','voice']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
