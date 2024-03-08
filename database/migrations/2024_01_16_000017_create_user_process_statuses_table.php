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
        Schema::create('user_process_statuses', function (Blueprint $table) {
            $table->id();
            $table->text('status');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_process');
            $table->date('l1_date');
            $table->date('l2_date');
            $table->date('l3_date');
            $table->date('l4_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_process_statuses');
    }
};
