<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Lindup_produksi_sampah extends Model
{
    protected $table='lindup_produksi_sampah';
    protected $primaryKey='id';
    protected $fillable=['kecamatan', 'bulan', 'produksi_m3','terangkat', 'status', 'tahun'];
}
