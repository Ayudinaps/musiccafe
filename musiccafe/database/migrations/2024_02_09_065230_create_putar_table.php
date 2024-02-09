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
        Schema::create('putar', function (Blueprint $table) {
            $table->id('id_putar');
            $table->integer('id_dj')->nullable();
            $table->integer('id_pendengar')->nullable();
            $table->integer('id_lagu')->nullable();
            $table->timestamp('created_at');
            $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('putar');
    }
};
