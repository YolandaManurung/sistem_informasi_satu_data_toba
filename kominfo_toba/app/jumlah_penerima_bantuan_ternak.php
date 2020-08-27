<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jumlah_penerima_bantuan_ternak extends Model
{
    protected $table='penerima_kelompok_bantuan_ternak';
    protected $primaryKey='id';
    protected $fillable=['kategori','kecamatan','desa_kelurahan','jumlah_kelompok','jumlah_ternak','tahun'];
}