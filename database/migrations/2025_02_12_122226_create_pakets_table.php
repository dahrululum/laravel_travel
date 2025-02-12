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
        Schema::create('data_paket', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('jenispaket_id')->constrained('ref_jenispaket')->cascadeOnDelete();
            $table->foreignId('programhari_id')->constrained('ref_programhari')->cascadeOnDelete();
            $table->foreignId('hotel_id')->constrained('ref_hotel')->cascadeOnDelete();
            $table->foreignId('kamar_id')->constrained('ref_hotel')->cascadeOnDelete();
            $table->foreignId('itinerary_id')->constrained('ref_itinerary')->cascadeOnDelete();
            $table->foreignId('maskapai_id')->constrained('ref_maskapai')->cascadeOnDelete();
            $table->foreignId('fasilitas_id')->constrained('ref_fasilitas')->cascadeOnDelete();
            $table->foreignId('syarat_id')->constrained('ref_persyaratan')->cascadeOnDelete();
            $table->string('namapaket');
            $table->json('images')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('stok')->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_paket');
    }
};
