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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("basvuru_id");
            $table->string('program_adi');
            $table->string('program_sorumlusu_ismi');
            $table->string('program_sorumlusu_telefon');
            $table->string('talep_yapan_kisi');
            $table->string('email');
            $table->string('kalkis_yeri');
            $table->string('gidilecek_yer');
            $table->date('kalkis_tarihi');
            $table->time('kalkis_saati');
            $table->date('donus_tarihi');
            $table->time('donus_saati');
            $table->integer('odeme_tipi');
            $table->integer('grup_tanimi');
            $table->text('aciklama');
            $table->string("basvuru_durumu");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
