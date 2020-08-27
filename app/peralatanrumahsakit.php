<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peralatanrumahsakit extends Model
{
    protected $table = 'rsud_peralatan_rumah_sakit';
    protected $primaryKey='id';
    protected $fillable=['jenis_peralatan_rumah_sakit','jumlah','tahun'];
}
