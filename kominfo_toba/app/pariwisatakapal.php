<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pariwisatakapal extends Model
{
    protected $table = 'pariwisata_jenis_kapal'; 
    protected $primaryKey='id';
    protected $fillable=['perahu_tanpa_motor','kecamatan','perahu_motor_tempel','tahun','kapal_motor','status'];
    
}
