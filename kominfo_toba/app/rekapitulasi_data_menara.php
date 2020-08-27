<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rekapitulasi_data_menara extends Model
{
    protected $table='teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara';
    protected $primaryKey='id';
    protected $fillable=['kecamatan', 'kategori_kecamatan', 'imb', 'tinggi_menara', 'pemilik', 'pengguna', 'tahun'];
}