<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Kependudukan_jumlah_akta extends Model
{
    //
    protected $table='kependudukan_jumlah_akta';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','akta_kelahiran','akta_perkawinan','akta_perceraian', 'yang_memiliki_ektp', 'tahun', 'status'];
}
