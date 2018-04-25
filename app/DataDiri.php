<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    protected $table = 'data_diri';
    protected $primaryKey = 'ID_DATA_DIRI';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['NAMA', 'NAMA_INSTITUSI', 'NO_IDENTITAS', 'NO_TELEPON', 'EMAIL', 
            'ALAMAT', 'JENIS_KELAMIN','TGL_BUAT','ID_USER'];


    public function user(){
      return $this->belongsTo('App\User','ID_USER','ID_USER');
    }
            
}
