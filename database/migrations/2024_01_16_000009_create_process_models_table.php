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
        Schema::create('process_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_process');
            $table->unsignedBigInteger('id_model');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_models');
    }
};
