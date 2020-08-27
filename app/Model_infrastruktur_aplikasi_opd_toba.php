<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_infrastruktur_aplikasi_opd_toba extends Model
{
    protected $table='infrastruktur-aplikasiopdtoba';
    protected $primaryKey='id';
    protected $fillable=['Nama_OPD','aplikasi', 'status', 'tahun'];
}
