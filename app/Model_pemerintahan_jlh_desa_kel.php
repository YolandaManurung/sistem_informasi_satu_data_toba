<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_pemerintahan_jlh_desa_kel extends Model
{
    protected $table='pemerintahan-jumlahdesakel';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','Jumlah_Desa','Jumlah_Kelurahan', 'tahun', 'status'];
}
