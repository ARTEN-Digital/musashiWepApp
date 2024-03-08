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
        Schema::create('user_answers_checklist', function (Blueprint $table) {
            $table->id();
            $table->text('status');
            $table->unsignedBigInteger('id_user_checklist');
            $table->unsignedBigInteger('id_concept');
            $table->unsignedBigInteger('id_evaluator');
            $table->text('comment');
            $table->date('datefirsteval');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answers_checklist');
    }
};
