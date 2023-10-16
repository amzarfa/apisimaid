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
        Schema::create('ren_pkau', function (Blueprint $table) {
            $table->id('id_pkau');
            $table->bigInteger('id_jakwas')->index()->nullable();

            $table->char('kode_sub_unit_audit', 6)->index();
            $table->string('nama_sub_unit_audit')->nullable();
            $table->char('kode_unit_audit', 4)->index();
            $table->string('nama_unit_audit')->nullable();
            $table->char('kode_lingkup_audit', 4)->index();
            $table->string('nama_lingkup_audit')->nullable();
            $table->char('kode_area_pengawasan', 2)->index();
            $table->string('nama_area_pengawasan')->nullable();
            $table->char('kode_jenis_pengawasan', 2)->index();
            $table->string('nama_jenis_pengawasan')->nullable();
            $table->char('kode_tingkat_resiko', 2)->index();
            $table->string('nama_tingkat_resiko')->nullable();
            $table->char('kode_bidang_obrik', 9)->index()->nullable();
            $table->string('nama_bidang_obrik')->nullable();

            $table->string('nama_pkau')->nullable();
            $table->text('deskripsi_pkau')->nullable();
            $table->year('tahun_pkau')->nullable();
            $table->date('rmp')->nullable();
            $table->date('rpl')->nullable();
            $table->smallInteger('jumlah_hp_wpj')->nullable();
            $table->smallInteger('jumlah_hp_spv')->nullable();
            $table->smallInteger('jumlah_hp_kt')->nullable();
            $table->smallInteger('jumlah_hp_at')->nullable();
            $table->smallInteger('jumlah_hari_pengawasan')->nullable();
            $table->double('anggaran_biaya')->nullable();
            $table->smallInteger('jumlah_lhp_terbit')->nullable();
            $table->string('kebutuhan_sarpras')->nullable();
            $table->string('keterangan')->nullable();

            // Audit Trails
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
        Schema::dropIfExists('ren_pkau');
    }
};
