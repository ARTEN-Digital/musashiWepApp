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
        Schema::create('area_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_process');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_processes');
    }
};
