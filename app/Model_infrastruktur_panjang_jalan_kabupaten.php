<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_infrastruktur_panjang_jalan_kabupaten extends Model
{
    protected $table='infrastruktur-panjangjalankabupaten';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','panjang_jalan', 'tahun', 'status'];
}
