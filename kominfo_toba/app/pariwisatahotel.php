<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pariwisatahotel extends Model
{
    protected $table = 'pariwisata_hotel'; 
    protected $primaryKey='id';
    protected $fillable=['hotel','kecamatan','jumlah_kamar','tahun'];
}
