<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_infrastruktur_perhitungan_dana_desa extends Model
{
    protected $table='infrastruktur-perhitungan_dana_desa';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','desa', 'alokasi_dasar', 'alokasi_formula', 'tahun', 'status'];
}
