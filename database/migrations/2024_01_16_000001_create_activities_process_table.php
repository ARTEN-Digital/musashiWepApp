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
        Schema::create('activities_process', function (Blueprint $table) {
            $table->unsignedBigInteger('id_activities');
            $table->unsignedBigInteger('id_process');
            $table->bigIncrements('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities_process');
    }
};
