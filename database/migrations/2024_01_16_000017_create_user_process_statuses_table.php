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
            $table->timestamp('l1_date')->nullable();
            $table->unsignedBigInteger('id_trainer_l1')->nullable();
            $table->timestamp('l2_date')->nullable();
            $table->unsignedBigInteger('id_trainer_l2')->nullable();
            $table->timestamp('l3_date')->nullable();
            $table->unsignedBigInteger('id_trainer_l3')->nullable();
            $table->timestamp('l4_date')->nullable();
            $table->unsignedBigInteger('id_trainer_l4')->nullable();
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
