<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_PDAM_jumlah_pemakaian_air_bersih extends Model
{
    protected $table='pdam_jumlah_pemakaian_air_bersih';
    protected $primaryKey='id';
    protected $fillable=['pemakaian_air_bersih', 'jumlah','status', 'tahun'];
}
