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
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->dropForeign(['no_telepon']);
            $table->dropForeign(['noTelepon_tujuan']);
            $table->dropColumn('no_telepon');
            $table->dropColumn('noTelepon_tujuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->unsignedBigInteger('no_telepon')->unique();
            $table->unsignedBigInteger('noTelepon_tujuan')->unique();

            $table->foreign('no_telepon')->references('id')->on('rekenings');
            $table->foreign('noTelepon_tujuan')->references('id')->on('rekenings');
        });
    }
};
