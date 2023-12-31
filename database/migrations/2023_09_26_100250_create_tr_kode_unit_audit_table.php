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
        Schema::create('tr_kode_unit_audit', function (Blueprint $table) {
            $table->char('kode_unit_audit', 4)->index()->primary();
            $table->string('nama_unit_audit')->nullable();
            $table->boolean('jenis')->nullable();
            $table->string('jenis_unit_audit')->nullable();
            $table->string('logo')->nullable();
            $table->string('alamat')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('tr_kode_unit_audit');
    }
};
