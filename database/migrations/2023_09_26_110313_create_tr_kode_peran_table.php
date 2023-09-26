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
        Schema::create('tr_kode_peran', function (Blueprint $table) {
            $table->id('id_peran');
            $table->char('kode_peran', 3)->index();
            $table->string('nama_peran')->nullable();
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
        Schema::dropIfExists('tr_kode_peran');
    }
};
