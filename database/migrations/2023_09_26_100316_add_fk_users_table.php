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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('peran_ren')->references('kode_peran')->on('users_peran');
            $table->foreign('peran_lak')->references('kode_peran')->on('users_peran');
            $table->foreign('peran_por')->references('kode_peran')->on('users_peran');
            $table->foreign('peran_simhpnas')->references('kode_peran')->on('users_peran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['peran_ren']);
            $table->dropForeign(['peran_lak']);
            $table->dropForeign(['peran_por']);
            $table->dropForeign(['peran_simhpnas']);
        });
    }
};
