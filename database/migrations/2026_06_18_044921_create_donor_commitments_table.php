<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donor_commitments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('blood_request_id')->constrained()->cascadeOnDelete();
            $table->string('status')->default('Bersedia'); // Bersedia | Selesai | Dibatalkan
            $table->timestamps();

            // Satu user hanya bisa bersedia sekali per permintaan
            $table->unique(['user_id', 'blood_request_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donor_commitments');
    }
};
