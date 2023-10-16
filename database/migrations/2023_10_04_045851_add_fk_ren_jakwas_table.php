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
        Schema::table('ren_jakwas', function (Blueprint $table) {
            $table->foreign('kode_unit_audit')->references('kode_unit_audit')->on('tr_kode_unit_audit')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ren_jakwas', function (Blueprint $table) {
            $table->dropForeign(['kode_unit_audit']);
        });
    }
};
