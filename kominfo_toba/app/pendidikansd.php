<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendidikansd extends Model
{
    
    protected $table = 'pendidikan_sd';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','jumlah_guru','tahun','jumlah_sd','jumlah_murid','negeri','swasta','Madrasah_Ibtidaiyah_Tsanawiyah'];  
}
