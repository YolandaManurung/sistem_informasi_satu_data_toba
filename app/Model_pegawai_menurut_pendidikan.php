<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_pegawai_menurut_pendidikan extends Model
{
    protected $table='pegawai_menurut_pendidikan';
    protected $primaryKey='id';
    protected $fillable=['tahun','sd','smp', 'sma','s1','s2','s3', 'jumlah_total','status'];
}
