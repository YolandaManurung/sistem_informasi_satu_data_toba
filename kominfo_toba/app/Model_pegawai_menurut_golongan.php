<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_pegawai_menurut_golongan extends Model
{
    protected $table='pegawai_menurut_golongan';
    protected $primaryKey='id';
    protected $fillable=['tahun','pendidikan1','pendidikan2', 'pendidikan3','pendidikan4','jumlah_total1','jumlah_total', 'status'];
}
