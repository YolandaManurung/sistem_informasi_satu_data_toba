<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class luas_tanaman_dan_produksi_karet_dan_kelapa_sawit extends Model
{
    protected $table='perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','luas_areal_karet','produksi_karet','produktivitas_karet','luas_areal_kelapa_sawit','produksi_kelapa_sawit','produktivitas_kelapa_sawit','tahun'];
}