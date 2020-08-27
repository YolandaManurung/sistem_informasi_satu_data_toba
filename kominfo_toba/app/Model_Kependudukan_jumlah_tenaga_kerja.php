<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Kependudukan_jumlah_tenaga_kerja extends Model
{
    //
    protected $table='kependudukan_tenaga_kerja';
    protected $primaryKey='id';
    protected $fillable=['kelompok_umur','bekerja','pencari_kerja','angkatan_kerja', 'bukan_angkatan_kerja','tenaga_kerja', 'APAK', 'pengangguran_terbuka','tahun', 'status'];
}

