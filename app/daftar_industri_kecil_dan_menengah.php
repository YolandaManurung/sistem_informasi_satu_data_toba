<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class daftar_industri_kecil_dan_menengah extends Model
{
    protected $table='perindustrian_industri_kecil_dan_menengah';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','pangan_unit','pangan_tenaga_kerja', 'sandang_dan_kulit_unit', 'sandang_dan_kulit_tenaga_kerja', 'kimia_dan_bahan_bangunan_unit', 'kimia_dan_bahan_bangunan_tenaga_kerja', 'kerajinan_umum_unit', 'kerajinan_umum_tenaga_kerja', 'logam_metal_unit', 'logam_metal_tenaga_kerja', 'tahun'];
}