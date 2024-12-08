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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('no_telepon')->unique();
            $table->unsignedBigInteger('noTelepon_tujuan')->unique();
            $table->bigInteger('jumlah_transaksi')->default(0);
            $table->timestamp('tanggal_transaksi')->default(now());
            $table->string('jenis_transaksi')->nullable();

            $table->foreign('no_telepon')->references('id')->on('rekenings');
            $table->foreign('noTelepon_tujuan')->references('id')->on('rekenings');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
