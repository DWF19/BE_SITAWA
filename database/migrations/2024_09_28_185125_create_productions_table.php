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
        Schema::create('productions', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('kecamatan');
            $table->string('bulan');
            $table->string('tahun');
            // jumlah padi 
            $table->string('jumlah_padi_akhir_bulan_lalu')->nullable();
            $table->string('jumlah_padi_panen')->nullable();
            $table->string('jumlah_padi_tanam')->nullable();  
            $table->string('jumlah_padi_rusak')->nullable(); 
            $table->string('jumlah_padi_akhir_bulan')->nullable(); 
            // jenis padi hibrida bantuan pemerintah
            $table->string('jenis_padi_akhir_bulan_lalu_hibrida')->nullable();
            $table->string('jenis_padi_panen_hibrida')->nullable();
            $table->string('jenis_padi_tanam_hibrida')->nullable();
            $table->string('jenis_padi_rusak_hibrida')->nullable();
            $table->string('jenis_padi_akhir_bulan_hibrida')->nullable();
            // jenis padi hibrida non bantuan pemerintah
            $table->string('jenis_padi_akhir_bulan_lalu_non_hibrida')->nullable();  
            $table->string('jenis_padi_panen_non_hibrida')->nullable();
            $table->string('jenis_padi_tanam_non_hibrida')->nullable();
            $table->string('jenis_padi_rusak_non_hibrida')->nullable();
            $table->string('jenis_padi_akhir_bulan_non_hibrida')->nullable();
            // jenis padi inbrida bantuan pemerintah  
            $table->string('jenis_padi_akhir_bulan_lalu_inbrida')->nullable();
            $table->string('jenis_padi_panen_inbrida')->nullable();
            $table->string('jenis_padi_tanam_inbrida')->nullable();
            $table->string('jenis_padi_rusak_inbrida')->nullable();
            $table->string('jenis_padi_akhir_bulan_inbrida')->nullable();
            // jenis padi inbrida non bantuan pemerintah
            $table->string('jenis_padi_akhir_bulan_lalu_non_inbrida')->nullable();
            $table->string('jenis_padi_panen_non_inbrida')->nullable();
            $table->string('jenis_padi_tanam_non_inbrida')->nullable();
            $table->string('jenis_padi_rusak_non_inbrida')->nullable();
            $table->string('jenis_padi_akhir_bulan_non_inbrida')->nullable();
            // jenis pengairan sawah irigasi
            $table->string('sawah_irigasi_akhir_bulan_lalu')->nullable();
            $table->string('sawah_irigasi_panen')->nullable();
            $table->string('sawah_irigasi_tanam')->nullable();
            $table->string('sawah_irigasi_rusak')->nullable();
            $table->string('sawah_irigasi_akhir_bulan')->nullable();
            // jenis pengairan sawah tadah hujan
            $table->string('sawah_tadah_hujan_akhir_bulan_lalu')->nullable();
            $table->string('sawah_tadah_hujan_panen')->nullable();
            $table->string('sawah_tadah_hujan_tanam')->nullable();
            $table->string('sawah_tadah_hujan_rusak')->nullable();
            $table->string('sawah_tadah_hujan_akhir_bulan')->nullable();
            // jenis pengairan sawah pasang surut
            $table->string('sawah_pasang_surut_akhir_bulan_lalu')->nullable();
            $table->string('sawah_pasang_surut_panen')->nullable();
            $table->string('sawah_pasang_surut_tanam')->nullable();
            $table->string('sawah_pasang_surut_rusak')->nullable();
            $table->string('sawah_pasang_surut_akhir_bulan')->nullable();
            // jenis pengairan sawah lebak
            $table->string('sawah_lebak_akhir_bulan_lalu')->nullable();
            $table->string('sawah_lebak_panen')->nullable();
            $table->string('sawah_lebak_tanam')->nullable();
            $table->string('sawah_lebak_rusak')->nullable();
            $table->string('sawah_lebak_akhir_bulan')->nullable();
            $table->timestamps();

            // foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
