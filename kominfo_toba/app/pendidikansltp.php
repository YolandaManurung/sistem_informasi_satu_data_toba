<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendidikansltp extends Model
{
    
    protected $table = 'pendidikan_sltp';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','jumlah_guru','tahun','jumlah_sltp','jumlah_murid','negeri','swasta','Madrasah_Ibtidaiyah_Tsanawiyah'];    
}
