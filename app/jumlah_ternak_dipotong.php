<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jumlah_ternak_dipotong extends Model
{
    protected $table='peternakan_jumlah_ternak_dipotong';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','sapi_perah','sapi_potong','kerbau','kuda','kambing','domba','babi','tahun'];
}