<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Kesehatan_jumlah_dokter extends Model
{
    //
    protected $table='kesehatan_jumlah_dokter';
    protected $primaryKey='id';
    protected $fillable=['unit_kerja','dokter_umum','dokter_gigi', 'dokter_spesialis', 'tahun', 'status'];
}
