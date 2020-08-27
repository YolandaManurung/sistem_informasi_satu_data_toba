<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Kesehatan_jumlah_fasilitas_kesehatan extends Model
{
    //
    protected $table='kesehatan_jumlah_fasilitas_kesehatan';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','rumah_sakit',
    'rumah_bersalin', 'puskesmas', 'puskesmas_pembantu', 
    'poskesdes', 'balai_kesehatan', 'polindes', 'apotek', 
    'toko_obat','tahun', 'status'];
}

