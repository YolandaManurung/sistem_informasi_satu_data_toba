<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class luas_tanaman_dan_produksi_kelapa_dan_pinang extends Model
{
    protected $table='perkebunan_luas_dan_produksi_kelapa_dan_pinang';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','luas_areal_kelapa','produksi_kelapa','produktivitas_kelapa','luas_areal_pinang','produksi_pinang','produktivitas_pinang','tahun'];
}