<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class populasi_ternak_besar extends Model
{
    protected $table='peternakan_populasi_ternak_besar';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','sapi_perah','sapi_potong','kerbau','kuda','kambing','domba','babi','tahun'];
}