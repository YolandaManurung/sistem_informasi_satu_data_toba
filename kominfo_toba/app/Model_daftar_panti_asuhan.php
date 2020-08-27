<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_daftar_panti_asuhan extends Model
{
    //
    protected $table='kesehatan_daftar_panti_asuhan';
    protected $primaryKey='id';
    protected $fillable=['nama_panti','alamat','pimpinan', 'terdaftar','jumlah_penghuni', 'tahun', 'status'];
}
