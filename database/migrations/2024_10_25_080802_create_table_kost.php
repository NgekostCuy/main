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
        // Buat tabel kost
        Schema::create('kost', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('peraturan');
            $table->string('nama_pemilik');
            $table->string('nomor_hp');
            $table->integer('harga');
            $table->integer('jumlah_kamar');
            $table->string('main_image')->nullable(); // Mengubah kolom 'image' menjadi 'main_image'
            $table->timestamps();
        });

        // Buat tabel kost_images untuk menyimpan beberapa gambar terkait kost
        Schema::create('kost_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kost_id')->constrained('kost')->onDelete('cascade'); // Referensi ke tabel kost
            $table->string('file_name');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel kost_images terlebih dahulu karena memiliki foreign key ke tabel kost
        Schema::dropIfExists('kost_images');
        // Hapus tabel kost
        Schema::dropIfExists('kost');
    }
};
