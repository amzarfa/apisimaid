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
        Schema::create('t_log_activity', function (Blueprint $table) {
            $table->id('idt_log_activity');
            $table->bigInteger('idt_user')->index()->nullable();
            $table->string('page')->nullable();
            $table->string('name')->nullable();
            $table->string('activity')->nullable();
            $table->string('method')->nullable();
            $table->string('key')->nullable();
            $table->string('keyname')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->default(null)->onUpdate(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_log_activity');
    }
};
