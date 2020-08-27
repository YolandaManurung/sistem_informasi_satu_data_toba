<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Lindup_jenis_daur_ulang_sampah extends Model
{
    protected $table='lindup_jenis_daur_ulang_sampah';
    protected $primaryKey='id';
    protected $fillable=['kecamatan', 'daur_ulang', 'ton','produksi', 'status', 'tahun'];
}
