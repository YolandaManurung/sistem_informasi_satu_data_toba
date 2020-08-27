<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_infrastruktur_pembangunan_bersumber_dana_desa extends Model
{
    protected $table='infrastruktur-pembangunanbersumberdanadesa';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','desa', 'irigasi', 'jalan_desa', 'keterangan','jumlah','tahun', 'status'];
}
