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
        Schema::table('equipament_process', function (Blueprint $table) {
            $table
                ->foreign('id_process')
                ->references('id')
                ->on('processes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('id_equipament')
                ->references('id')
                ->on('equipaments')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipament_process', function (Blueprint $table) {
            $table->dropForeign(['id_process']);
            $table->dropForeign(['id_equipament']);
        });
    }
};
