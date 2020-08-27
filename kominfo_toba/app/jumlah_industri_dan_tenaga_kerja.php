<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jumlah_industri_dan_tenaga_kerja extends Model
{
    protected $table='perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah';
    protected $primaryKey='id';
    protected $fillable=['kecamatan', 'industri_kecil_dan_menengah', 'tenaga_kerja', 'tahun'];
}