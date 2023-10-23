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
        Schema::create('tr_data_pegawai', function (Blueprint $table) {
            $table->id();
            $table->char('kode_sub_unit_audit', 6)->index()->nullable();
            $table->char('kode_unit_audit', 4)->index()->nullable();
            $table->string('nip', 30)->nullable();
            $table->string('nip_lama', 30)->nullable();
            $table->string('nama')->nullable();
            $table->string('nama_dan_gelar')->nullable();
            $table->string('email')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('jenis_kelamin', 20)->nullable();
            $table->string('golongan_ruang', 20)->nullable();
            $table->string('nama_pangkat', 30)->nullable();
            $table->string('jabatan', 50)->nullable();
            $table->string('status', 50)->nullable()->default('active');
            $table->boolean('is_del')->default(false);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->default(null)->onUpdate(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('created_by')->nullable()->default('SYSTEM');
            $table->string('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_data_pegawai');
    }
};
