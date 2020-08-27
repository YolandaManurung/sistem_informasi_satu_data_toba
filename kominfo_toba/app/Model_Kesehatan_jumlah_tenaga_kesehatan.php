<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Kesehatan_jumlah_tenaga_kesehatan extends Model
{
    //
    protected $table='kesehatan_jumlah_tenaga_kesehatan';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','tenaga_medis','tenaga_keperawatan', 'tenaga_kebidanan', 'tenaga_kefarmasian', 'tenaga_kesehatan_lainnya', 'tahun', 'status'];
}
