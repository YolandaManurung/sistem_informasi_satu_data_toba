<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tenagadokter extends Model
{
    protected $table = 'rsud_tenaga_medis';
    protected $primaryKey='id';
    protected $fillable=['dokter','jumlah','tahun'];
}
