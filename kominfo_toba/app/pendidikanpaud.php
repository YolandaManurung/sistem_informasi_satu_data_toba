<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendidikanpaud extends Model
{
    protected $table = 'pendidikan_paud';
    protected $primaryKey='id';
    protected $fillable=['kecamatan','jumlah_guru','tahun','jumlah_paud','jumlah_murid','negeri','swasta','Madrasah_Ibtidaiyah_Tsanawiyah']; 
    
}
