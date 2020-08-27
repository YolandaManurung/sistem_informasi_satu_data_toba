<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jumlah_desa_blank_spot extends Model
{
    protected $table='teknologi_jumlah_desa_blank_spot';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','data_blank_spot', 'tahun'];
}