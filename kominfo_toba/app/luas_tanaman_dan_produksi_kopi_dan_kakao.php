<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class luas_tanaman_dan_produksi_kopi_dan_kakao extends Model
{
    protected $table='perkebunan_luas_dan_produksi_kopi_dan_kakao';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','luas_areal_kopi','produksi_kopi','produktivitas_kopi','luas_areal_kakao','produksi_kakao','produktivitas_kakao','tahun'];
}