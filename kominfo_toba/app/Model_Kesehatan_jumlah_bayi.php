<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_Kesehatan_jumlah_bayi extends Model
{
    //
    protected $table='kesehatan_jumlah_bayi_bblr';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','bayi_lahir','BBLR_jumlah', 'BBLR_dirujuk','BBLR_giji_buruk', 'tahun', 'status'];
}
