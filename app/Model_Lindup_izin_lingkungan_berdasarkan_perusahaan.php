<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Lindup_izin_lingkungan_berdasarkan_perusahaan extends Model
{
    protected $table='lindup_jenis_perusahaan';
    protected $primaryKey='id';
    protected $fillable=['nama_perusahaan', 'amdal', 'ukl_upl','sppl', 'jumlah', 'status', 'tahun'];
}
