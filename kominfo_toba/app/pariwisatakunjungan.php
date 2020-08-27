<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pariwisatakunjungan extends Model
{
    protected $table = 'pariwisata_kunjungan_kapal'; 
    protected $primaryKey='id';
    protected $fillable=['kecamatan','jumlah_barang','jumlah_penumpang','jumlah_kapal','tahun'];
    
}
