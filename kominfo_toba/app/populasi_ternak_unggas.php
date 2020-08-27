<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class populasi_ternak_unggas extends Model
{
    protected $table='peternakan_populasi_ternak_unggas';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','ayam_kampung','ayam_pedaging','ayam_petelor','itik_itik_manila','tahun'];
}