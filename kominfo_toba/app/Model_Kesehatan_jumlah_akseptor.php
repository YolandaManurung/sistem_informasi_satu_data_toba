<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Kesehatan_jumlah_akseptor extends Model
{
    //
    protected $table='kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','iud','mow', 'mop','implant','suntik', 'pil', 'kondom','jumlah', 'tahun', 'status'];
}
