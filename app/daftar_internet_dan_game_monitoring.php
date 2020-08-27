<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class daftar_internet_dan_game_monitoring extends Model
{
    protected $table='teknologi_daftar_internet_game_monitoring';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','nama_internet','alamat', 'nama_pemilik', 'tahun'];
}