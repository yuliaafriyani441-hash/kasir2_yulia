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
        Schema::create('jurusan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jurusan', 20);
            $table->string('nama_jurusan', 20);
            $table->string('keterangan', 20);
            $table->enum('status ', ['aktif', 'nonaktif']) ->default('aktif');
            $table->timestamps('created_at', 6)->nullable();
            $table->timestamps('updated_at', 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusan');
    }
};
