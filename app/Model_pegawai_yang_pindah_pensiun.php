<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_pegawai_yang_pindah_pensiun extends Model
{
    protected $table='pegawai_yang_pindah_pensiun';
    protected $primaryKey='id';
    protected $fillable=['tahun','pindah_keluar_tobasa','pindah_masuk_tobasa', 'pensiun','status'];
}