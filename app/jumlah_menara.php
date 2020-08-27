<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jumlah_menara extends Model
{
    protected $table='teknologi_jumlah_menara';
    protected $primaryKey='id';
    protected $fillable=['kecamatan', 'jumlah_menara', 'tahun'];
}