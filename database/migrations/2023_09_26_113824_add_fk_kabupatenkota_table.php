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
        Schema::table('tr_kode_kabupatenkota', function (Blueprint $table) {
            $table->foreign('kode_provinsi')->references('kode_provinsi')->on('tr_kode_provinsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tr_kode_kabupatenkota', function (Blueprint $table) {
            $table->dropForeign(['kode_provinsi']);
        });
    }
};
