<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('m_pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->unsignedBigInteger('id_warga')->index();
            $table->unsignedBigInteger('id_surat')->index();
            $table->binary('ktp')->nullable();
            $table->binary('kk')->nullable();
            $table->binary('bukti_kepimilikan_rumah')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            // Foreign keys and indexes
            $table->foreign('id_warga')->references('id_warga')->on('m_warga');
            $table->foreign('id_surat')->references('id_surat')->on('m_surat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_pengajuan');
    }
};
