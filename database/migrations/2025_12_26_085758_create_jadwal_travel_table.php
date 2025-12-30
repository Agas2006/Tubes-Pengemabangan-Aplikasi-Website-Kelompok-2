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
        Schema::create('jadwal_travel', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->string('asal');
            $table->string('tujuan');
            $table->date('tanggal_berangkat');
            $table->time('jam_berangkat');
            $table->integer('harga');
            $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_travel');
    }
};
