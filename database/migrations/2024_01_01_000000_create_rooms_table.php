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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('price'); // e.g., '$420/night'
            $table->string('image_path');
            $table->string('category'); // 'suite', 'penthouse', 'standard'
            $table->json('features'); // Store features as JSON array
            $table->string('size');
            $table->integer('max_guests');
            $table->decimal('rating', 3, 1);
            $table->string('theme'); // 'solice' or 'vault'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
