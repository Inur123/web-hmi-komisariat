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
        Schema::create('alumnis', function (Blueprint $table) {
        $table->id();
        $table->string('nama')->nullable();
        $table->enum('jenis_kelamin', ['L','P']); // wajib diisi
        $table->string('alamat')->nullable();
         $table->enum('jabatan', ['Alumni', 'Ketua Umum'])->default('Alumni');
        $table->string('nohp')->nullable();
        $table->string('foto')->nullable();
        $table->string('fakultas')->nullable();
        $table->string('prodi')->nullable();
        $table->string('periode')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
