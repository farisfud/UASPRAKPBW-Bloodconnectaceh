<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('nama_pasien');
            $table->string('gol_darah');
            $table->string('rhesus');
            $table->integer('jumlah_kantong');
            $table->string('tingkat_urgensi')->default('Sedang');
            $table->string('rumah_sakit');
            $table->string('lokasi');
            $table->string('kontak_nama');
            $table->string('kontak_telepon');
            $table->text('catatan')->nullable();
            $table->string('status')->default('Menunggu Donor');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blood_requests');
    }
};
