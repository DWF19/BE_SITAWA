<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kecamatan',
        'bulan',
        'tahun',
        'jumlah_padi_akhir_bulan_lalu',
        'jumlah_padi_panen',
        'jumlah_padi_tanam',
        'jumlah_padi_rusak',
        'jumlah_padi_akhir_bulan',
        'jenis_padi_akhir_bulan_lalu_hibrida',
        'jenis_padi_panen_hibrida',
        'jenis_padi_tanam_hibrida',
        'jenis_padi_rusak_hibrida',
        'jenis_padi_akhir_bulan_hibrida',
        'jenis_padi_akhir_bulan_lalu_non_hibrida',
        'jenis_padi_panen_non_hibrida',
        'jenis_padi_tanam_non_hibrida',
        'jenis_padi_rusak_non_hibrida',
        'jenis_padi_akhir_bulan_non_hibrida',
        'jenis_padi_akhir_bulan_lalu_inbrida',
        'jenis_padi_panen_inbrida',
        'jenis_padi_tanam_inbrida',
        'jenis_padi_rusak_inbrida',
        'jenis_padi_akhir_bulan_inbrida',
        'jenis_padi_akhir_bulan_lalu_non_inbrida',
        'jenis_padi_panen_non_inbrida',
        'jenis_padi_tanam_non_inbrida',
        'jenis_padi_rusak_non_inbrida',
        'jenis_padi_akhir_bulan_non_inbrida',
        'sawah_irigasi_akhir_bulan_lalu',
        'sawah_irigasi_panen',  
        'sawah_irigasi_tanam',
        'sawah_irigasi_rusak',
        'sawah_irigasi_akhir_bulan',
        'sawah_tadah_hujan_akhir_bulan_lalu',
        'sawah_tadah_hujan_panen',
        'sawah_tadah_hujan_tanam',
        'sawah_tadah_hujan_rusak',
        'sawah_tadah_hujan_akhir_bulan',
        'sawah_pasang_surut_akhir_bulan_lalu',
        'sawah_pasang_surut_panen',
        'sawah_pasang_surut_tanam',
        'sawah_pasang_surut_rusak',
        'sawah_pasang_surut_akhir_bulan',
        'sawah_lebak_akhir_bulan_lalu',
        'sawah_lebak_panen',
        'sawah_lebak_tanam',
        'sawah_lebak_rusak',
        'sawah_lebak_akhir_bulan',
    ];
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
