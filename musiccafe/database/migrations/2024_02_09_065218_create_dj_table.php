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
        Schema::create('dj', function (Blueprint $table) {
            $table->id('id_dj');
            $table->string('nama_dj');
            $table->string('hp');
            $table->timestamp('created_at');
            $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dj');
    }
};
