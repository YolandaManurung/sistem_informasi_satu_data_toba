<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Kesehatan_rekapitulasi_penyandang_masalah extends Model
{
    //
    protected $table='kesehatan_penyandang_masalah_kesejahteraan_sosial';
    protected $primaryKey='id';
    protected $fillable=['kecamatan', 'rastra_non_PKH', 'RLTH','KUBE', 'pendamping_anak_berhadapan_dengan_hukum', 'KAT', 'PKH', 'ASLUT', 'ASPD', 'ODHA', 'UEP_lansia','tahun', 'status'];
}
