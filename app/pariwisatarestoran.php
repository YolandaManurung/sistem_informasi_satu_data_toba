<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pariwisatarestoran extends Model
{
    protected $table = 'pariwisata_restoran'; 
    protected $primaryKey='id';
    protected $fillable=['kecamatan','jumlah','tahun'];
    
}
