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
        Schema::create('community', function (Blueprint $table) {
            $table->increments('id');
            $table->string('community_name');
            $table->string('comu_explanation');
            $table->unsignedInteger('genre_id');
            $table->string('game');
            $table->string('icon');
            $table->unsignedBigInteger('reader');
            $table->boolean('public_flag')->default(true);
            $table->boolean('delete_flag')->default(false);
            $table->boolean('report_flag')->default(false);
            $table->integer('report_count')->default(0);
            $table->timestamps();


            $table->foreign('genre_id')->references('id')->on('genre')->onDelete('cascade');
            $table->foreign('reader')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community');
    }
};
