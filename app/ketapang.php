<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ketapang extends Model
{
    protected $table = 'ketapang';
    protected $primaryKey='id';
    protected $fillable=['jenis_bantuan','kecamatan','jumlah','desa','tahun','keterangan']; 
}
