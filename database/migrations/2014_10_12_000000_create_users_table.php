<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->text('lastname')->nullable();
            $table->text('email')->nullable();
            $table->text('password');
            $table->text('payroll');
            $table->text('image_profile');
            $table->boolean('is_leader');
            $table->text('phone')->nullable();
            $table->unsignedBigInteger('id_leader');
            $table->boolean('active');
            $table->unsignedBigInteger('id_usertype');
            $table->unsignedBigInteger('id_position');
            $table->unsignedBigInteger('id_area');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
