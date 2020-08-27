<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Kesehatan_jumlah_kasus_penyakit extends Model
{
    //
    protected $table='kesehatan_jumlah_kasus_penyakit_terbanyak';
    protected $primaryKey='id';
    protected $fillable=['jenis_penyakit', 'jumlah_kunjungan','tahun', 'status'];
}
