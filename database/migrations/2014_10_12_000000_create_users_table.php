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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('kode_unit_audit', 4)->index()->nullable();
            $table->string('nama_unit_audit')->nullable();
            $table->string('kode_sub_unit_audit', 6)->index()->nullable();
            $table->string('nama_sub_unit_audit')->nullable();
            $table->string('kode_bidang_obrik', 9)->index()->nullable();
            $table->string('nama_bidang_obrik')->nullable();
            $table->string('peran', 20)->nullable()->default('user');
            $table->string('peran_ren', 20)->nullable();
            $table->string('peran_lak', 20)->nullable();
            $table->string('peran_por', 20)->nullable();
            $table->string('peran_simhpnas', 20)->nullable();
            $table->rememberToken()->nullable();
            $table->string('status', 20)->nullable()->default('active');
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
        Schema::dropIfExists('users');
    }
};
