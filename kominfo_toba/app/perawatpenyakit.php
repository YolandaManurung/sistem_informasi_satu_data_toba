<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perawatpenyakit extends Model
{
    protected $table = 'rsud_perawat_jenis_perawat';
    protected $primaryKey='id';
    protected $fillable=['perawat','jumlah','tahun'];
}
