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
        Schema::create('data_kost_peraturan_kost', function (Blueprint $table) {
            $table->foreignId('data_kost_id')->constrained('data_kost')->onDelete('cascade');
            $table->foreignId('peraturan_kost_id')->constrained('peraturan_kost')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kost_peraturan_kost');
    }
};
