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
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->string("nama_kost");
            $table->string("deskripsi_kost");
            $table->string("peraturan_kost");
            $table->string("fasilitas_kost");
            $table->string("nama_pemilik");
            $table->string("no_telepon");
            $table->integer("harga");
            $table->integer("jumlah_kamar");
            $table->text("cover");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosts');
    }
};
