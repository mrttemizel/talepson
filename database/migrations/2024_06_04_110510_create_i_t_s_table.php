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
        Schema::create('i_t_s', function (Blueprint $table) {
            $table->id();
            $table->string('talebi_yapan_birim')->nullable();
            $table->string('talebi_yapan_kisi')->nullable();
            $table->string('email')->nullable();
            $table->string('cep_telefonu')->nullable();
            $table->text('aciklama')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_t_s');
    }
};
