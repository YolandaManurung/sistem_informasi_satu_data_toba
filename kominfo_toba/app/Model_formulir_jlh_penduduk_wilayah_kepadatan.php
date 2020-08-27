<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_formulir_jlh_penduduk_wilayah_kepadatan extends Model
{
    protected $table='pemerintahan-jlhpendudukwilayahkepadatan';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','Jlh_Penduduk','Luas_Wilayah', 'status', 'tahun'];
}
