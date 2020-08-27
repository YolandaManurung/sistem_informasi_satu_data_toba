<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_infrastruktur_jembatan extends Model
{
    protected $table='infrastruktur-jembatan';
    protected $primaryKey='id';
    protected $fillable=['keadaan','jumlah_jembatan', 'status', 'tahun'];
}
