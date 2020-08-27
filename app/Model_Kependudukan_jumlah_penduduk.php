<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Kependudukan_jumlah_penduduk extends Model
{
    //
    protected $table='kependudukan_jumlah_penduduk';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','laki_laki','perempuan','tahun', 'status'];
}
