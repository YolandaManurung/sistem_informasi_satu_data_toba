<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_infrastruktur_panjang_jalan extends Model
{
    protected $table='infrastruktur-panjangjalan';
    protected $primaryKey='id';
    protected $fillable=['keadaan','kondisi_jalan', 'panjang_jalan_keadaan', 'panjang_jalan_kondisi_jalan',  'tahun', 'status'];
}
