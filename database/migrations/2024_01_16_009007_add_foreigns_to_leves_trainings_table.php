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
        Schema::table('leves_trainings', function (Blueprint $table) {
            $table
                ->foreign('leves_id')
                ->references('id')
                ->on('leves')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('trainings_id')
                ->references('id')
                ->on('trainings')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leves_trainings', function (Blueprint $table) {
            $table->dropForeign(['leves_id']);
            $table->dropForeign(['trainings_id']);
        });
    }
};
