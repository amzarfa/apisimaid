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
        Schema::table('ren_pkau', function (Blueprint $table) {
            $table->foreign('kode_sub_unit_audit')->references('kode_sub_unit_audit')->on('tr_kode_sub_unit_audit')->onUpdate('CASCADE');
            $table->foreign('kode_unit_audit')->references('kode_unit_audit')->on('tr_kode_unit_audit')->onUpdate('CASCADE');
            $table->foreign('kode_lingkup_audit')->references('kode_lingkup_audit')->on('tr_kode_lingkup_audit')->onUpdate('CASCADE');
            $table->foreign('kode_area_pengawasan')->references('kode_area_pengawasan')->on('tr_kode_area_pengawasan')->onUpdate('CASCADE');
            $table->foreign('kode_jenis_pengawasan')->references('kode_jenis_pengawasan')->on('tr_kode_jenis_pengawasan')->onUpdate('CASCADE');
            $table->foreign('kode_tingkat_resiko')->references('kode_tingkat_resiko')->on('tr_kode_tingkat_resiko')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ren_pkau', function (Blueprint $table) {
            $table->dropForeign(['kode_sub_unit_audit']);
            $table->dropForeign(['kode_unit_audit']);
            $table->dropForeign(['kode_lingkup_audit']);
            $table->dropForeign(['kode_area_pengawasan']);
            $table->dropForeign(['kode_jenis_pengawasan']);
            $table->dropForeign(['kode_tingkat_resiko']);
        });
    }
};
