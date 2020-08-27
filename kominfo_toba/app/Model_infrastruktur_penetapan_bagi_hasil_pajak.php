<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_infrastruktur_penetapan_bagi_hasil_pajak extends Model
{
    protected $table='infrastruktur-pembagianpenetapanbagihasilpajak';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','desa', 'irigasi', 'alokasi_dasar', 'alokasi_formula', 'bobot', 'realisasi_PBB', 'pagu_bagi','tahun', 'status'];
}
