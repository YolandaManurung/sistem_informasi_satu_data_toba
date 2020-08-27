<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pariwisataobjek extends Model
{
    protected $table = 'pariwisata_objek_wisata';  
    protected $primaryKey='id';
    protected $fillable=['lokasi','jenis_objek_wisata','tahun','daerah'];
    
}
