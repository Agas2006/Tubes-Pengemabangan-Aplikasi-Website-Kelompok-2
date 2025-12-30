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
       Schema::create('data_diri', function (Blueprint $table) {
            $table->id('id_data');
            $table->foreignId('id_pemesanan')->constrained('pemesanan','id_pemesanan');
            $table->string('nama');
            $table->text('alamat_penjemputan');
            $table->text('alamat_tujuan');
            $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_diri');
    }
};
