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
        Schema::create('data_kost', function (Blueprint $table) {
        
            $table->id(); 
            $table->string('nama_kost');
            $table->enum('jenis_kost', ['kost putra', 'kost putri', 'kost campur']); 
            $table->text('deskripsi_kost');
            $table->json('peraturan_kost'); 
            $table->date('dibangun_tahun'); 
            $table->text('nama_pengelola');
            $table->text('nomor_hp_pemilik');
            $table->text('alamat_kost');//page 2
            $table->string('foto_bangunan_tampak_depan');
            $table->string('foto_tampilan_dalam');
            $table->string('foto_tampak_jalan');//page 3
            $table->string('foto_depan_kamar');
            $table->string('foto_dalam_kamar');
            $table->string('foto_kamar_mandi');
            $table->string('foto_lainnya')->nullable();//page4
            $table->json('fasilitas_umum');
            $table->json('fasilitas_kamar');
            $table->json('fasilitas_kamar_mandi');
            $table->json('parkir');//page 5
            $table->string('ukuran_kamar'); 
            $table->integer('jumlah_total_kamar'); 
            $table->integer('jumlah_kamar_tersedia'); //page 6
            $table->integer('harga_sewa_per_bulan');
            $table->integer('harga_sewa_per_minggu')->nullable();
            $table->integer('harga_sewa_per_hari')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kost');
    }
};
