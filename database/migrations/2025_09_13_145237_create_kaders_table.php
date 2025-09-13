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
        Schema::create('kaders', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin')->nullable();
            $table->string('nohp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('prodi')->nullable();
            $table->string('hobi')->nullable();
            $table->string('foto')->nullable();
            $table->string('jabatan')->nullable();
            $table->foreignId('periode_id')->constrained('periodes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaders');
    }
};
