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
        Schema::create('community_report', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('community_id');
            $table->integer('report_reason');
            $table->boolean('delete_flag')->default(false);
            $table->timestamps();

            $table->foreign('community_id')->references('id')->on('community')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_report');
    }
};
