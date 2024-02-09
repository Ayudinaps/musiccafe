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
        Schema::create('lagu', function (Blueprint $table) {
            $table->id('id_lagu');
            $table->string('kode_lagu');
            $table->string('judul');
            $table->string('penyanyi');
            $table->string('kategori');
            $table->timestamp('created_at');
            $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lagu');
    }
};
