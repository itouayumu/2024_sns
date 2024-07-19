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
        Schema::create('achieve_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->string('achieve_name');
            $table->string('img');
            $table->string('game');
            $table->string('detail');
            $table->boolean('delete_flag')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achieve_tag');
    }
};
