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
                ->foreign('process_id')
                ->references('id')
                ->on('processes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('equipament_id')
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
            $table->dropForeign(['process_id']);
            $table->dropForeign(['equipament_id']);
        });
    }
};
