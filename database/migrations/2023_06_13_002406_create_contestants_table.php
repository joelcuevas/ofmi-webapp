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
        Schema::create('contestants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contest_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('status')->default('Activo');
            $table->string('school_level');
            $table->string('school_grade');
            $table->string('school_name');
            $table->string('tshirt_size');
            $table->string('tshirt_style');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contestants');
    }
};
