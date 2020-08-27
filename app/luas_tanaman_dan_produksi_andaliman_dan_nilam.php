<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class luas_tanaman_dan_produksi_andaliman_dan_nilam extends Model
{
    protected $table='perkebunan_luas_dan_produksi_andaliman_dan_nilam';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','luas_areal_andaliman','produksi_andaliman','produktivitas_andaliman','luas_areal_nilam','produksi_nilam','produktivitas_nilam','tahun'];
}