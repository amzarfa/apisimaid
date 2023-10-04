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
        Schema::create('tr_kode_sub_bidang_obrik', function (Blueprint $table) {
            $table->char('kode_sub_bidang_obrik', 12)->index()->primary();
            $table->char('kode_bidang_obrik', 9)->index();
            $table->char('kode_unit_obrik', 6)->index();
            $table->char('kode_unit_audit', 4)->index();
            $table->string('nama_sub_bidang_obrik')->nullable();
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
        Schema::dropIfExists('tr_kode_sub_bidang_obrik');
    }
};
