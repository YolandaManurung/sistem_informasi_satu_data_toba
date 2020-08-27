<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class luas_tanaman_dan_produksi_aren_dan_kemiri extends Model
{
    protected $table='perkebunan_luas_dan_produksi_aren_dan_kemiri';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','luas_areal_aren','produksi_aren','produktivitas_aren','luas_areal_kemiri','produksi_kemiri','produktivitas_kemiri','tahun'];
}