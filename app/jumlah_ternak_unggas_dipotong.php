<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jumlah_ternak_unggas_dipotong extends Model
{
    protected $table='peternakan_jumlah_ternak_unggas_dipotong';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','ayam_kampung','itik_itik_manila','tahun'];
}