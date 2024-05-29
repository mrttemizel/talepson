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
        Schema::create('technicals', function (Blueprint $table) {
            $table->id();
            $table->string("basvuru_id");
            $table->string('talep_yapan_birim')->nullable();
            $table->string('talep_yapan_kisi')->nullable();
            $table->string('telefon')->nullable();
            $table->string('email')->nullable();
            $table->string('taleple_ilgili_yer')->nullable();
            $table->date('talep_tarihi')->nullable();
            $table->time('talep_saati')->nullable();
            $table->string('talep_tipi')->nullable();
            $table->text('talep_tipi_diger')->nullable();
            $table->text('aciklama')->nullable();
            $table->string("basvuru_durumu");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technicals');
    }
};
