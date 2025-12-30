<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pemesanan', function (Blueprint $table) {
        $table->enum('status_pemesanan', ['pending_pembayaran', 'verifikasi_pembayaran', 'approved', 'cancelled'])
              ->default('pending_pembayaran')
              ->after('penumpang'); // sesuaikan posisi kolom
    });
}

public function down()
{
    Schema::table('pemesanan', function (Blueprint $table) {
        $table->dropColumn('status_pemesanan');
    });
}
};
