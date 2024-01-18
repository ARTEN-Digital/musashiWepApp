<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leves_trainings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leves_id');
            $table->unsignedBigInteger('trainings_id');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leves_trainings');
    }
};
