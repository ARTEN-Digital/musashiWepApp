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
                ->foreign('id_leves')
                ->references('id')
                ->on('leves')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('id_trainings')
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
            $table->dropForeign(['id_leves']);
            $table->dropForeign(['id_trainings']);
        });
    }
};
