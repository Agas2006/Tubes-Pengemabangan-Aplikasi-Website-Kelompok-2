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
     Schema::create('pemesanan', function (Blueprint $table) {
    $table->id('id_pemesanan');
    $table->foreignId('id_jadwal');
    $table->date('tanggal_berangkat')->nullable();
    $table->integer('penumpang');
    $table->timestamps();
    $table->enum('status_pembayaran', ['pending', 'approved', 'rejected'])->default('pending');
    $table->string('bukti_transfer')->nullable();

});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
