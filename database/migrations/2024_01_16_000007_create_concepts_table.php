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
        Schema::create('concepts', function (Blueprint $table) {
            $table->id();
            $table->text('concept');
            $table->text('number');
            $table->unsignedBigInteger('id_topics');
            $table->unsignedBigInteger('id_user');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concepts');
    }
};
