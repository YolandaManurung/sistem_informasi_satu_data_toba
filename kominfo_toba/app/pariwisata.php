<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pariwisata extends Model 
{
    protected $table = 'pariwisata_jumlah_wisata';
    protected $primaryKey='id';
    protected $fillable=['bulan','wisata_asing','wisata_nusantara','tahun']; 
} 
