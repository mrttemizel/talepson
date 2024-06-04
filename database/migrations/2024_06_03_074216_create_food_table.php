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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('program_adi')->nullable();

            $table->string('talep_yapan_birim')->nullable();
            $table->string('talep_yapan_kisi')->nullable();

            $table->string('email');

            $table->string('universite_sorumlu_isim')->nullable();
            $table->string('program_sorumlu_telefon')->nullable();

            $table->date('program_tarihi')->nullable();
            $table->time('program_saati')->nullable();

            $table->string('talep_tipi')->nullable();

            $table->string('ikram')->nullable();
            $table->string('ikram_diger')->nullable();
            $table->string('ikram_kisi_sayisi')->nullable();

            $table->string('yemek_kahvalti_tipi')->nullable();
            $table->string('yemek_diger')->nullable();
            $table->string('yemek_kisi_sayisi')->nullable();

            $table->string('yer')->nullable();
            $table->string('yer_diger')->nullable();

            $table->integer('yurt_acik_bufe_kahvalti_sayisi')->nullable();
            $table->integer('yurt_self_servis_ogle_yemegi_sayisi')->nullable();
            $table->integer('yurt_self_servis_aksam_yemegi_sayisi')->nullable();

            $table->integer('yurt_misafir_acik_bufe_kahvalti_sayisi')->nullable();
            $table->integer('yurt_misafir_self_servis_ogle_yemegi_sayisi')->nullable();
            $table->integer('yurt_misafir_self_servis_aksam_yemegi_sayisi')->nullable();

            $table->integer('acik_bufe_kahvalti_genel_toplam')->nullable();
            $table->integer('self_servis_ogle_yemegi_genel_toplam')->nullable();
            $table->integer('self_servis_aksam_yemegi_genel_toplam')->nullable();

            $table->string('grup_tanimi')->nullable();
            $table->string('grup_tanimi_diger')->nullable();

            $table->string('odeme_tipi')->nullable();
            $table->text('aciklama')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
