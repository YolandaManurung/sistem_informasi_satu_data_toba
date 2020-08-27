<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rawatinapkelas extends Model
{
    protected $table = 'rsud_jumlah_kamar_rawat_inap';
    protected $primaryKey='id';
    protected $fillable=['VIP','kelas1','kelas2','kelas3','tahun']; 
}
