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
        Schema::create('pendengar', function (Blueprint $table) {
            $table->id('id_pendengar');
            $table->string('nop');
            $table->string('nama_pendengar');
            $table->string('jenis_kelamin');
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
        Schema::dropIfExists('pendengar');
    }
};
