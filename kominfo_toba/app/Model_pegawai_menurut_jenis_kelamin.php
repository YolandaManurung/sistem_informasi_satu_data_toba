<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_pegawai_menurut_jenis_kelamin extends Model
{
    protected $table='pegawai_menurut_jenis_kelamin';
    protected $primaryKey='id';
    protected $fillable=['tahun','laki_laki','perempuan', 'jumlah_total', 'status'];
}
