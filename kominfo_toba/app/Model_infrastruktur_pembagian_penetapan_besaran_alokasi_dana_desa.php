<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_infrastruktur_pembagian_penetapan_besaran_alokasi_dana_desa extends Model
{
    protected $table='infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','desa', 'alokasi_dasar', 'alokasi_formula', 'tahun', 'status'];
}
