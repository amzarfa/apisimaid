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
        Schema::create('tr_kode_area_pengawasan', function (Blueprint $table) {
            $table->char('kode_area_pengawasan', 2)->index()->primary();
            $table->string('nama_area_pengawasan')->nullable();
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
        Schema::dropIfExists('tr_kode_area_pengawasan');
    }
};
