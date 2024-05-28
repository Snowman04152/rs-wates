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
        Schema::create('data_alats', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nama_alat');
            $table->string('gambar_alat');
            $table->string('jenis_alat');
            $table->string('merk');
            $table->string('ruangan');
            $table->timestamps();
        });

        Schema::create('jenis_alats', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('jenis_alat');
            $table->string('gambar_alat');
            $table->timestamps();
        });

        Schema::create('merks', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('merk');
            $table->timestamps();
        });

        Schema::create('ruangs', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('merk');
            $table->timestamps();
        });

        Schema::create('data_periksas', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('data_alat_id')->foreignId();
            $table->string('tanggal');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_alats');
        Schema::dropIfExists('jenis_alats');
        Schema::dropIfExists('merks');
        Schema::dropIfExists('ruangs');
        Schema::dropIfExists('data_periksas');
    }
};
