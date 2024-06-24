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
        Schema::create('user_achieve', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('achieve_id');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('achieve_id')->references('id')->on('achieve_tag')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_achieve');
    }
};
