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
        Schema::table('tr_kode_lingkup_audit', function (Blueprint $table) {
            $table->foreign('kode_grup_lingkup_audit')->references('kode_grup_lingkup_audit')->on('tr_kode_grup_lingkup_audit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tr_kode_lingkup_audit', function (Blueprint $table) {
            $table->dropForeign(['kode_grup_lingkup_audit']);
        });
    }
};
