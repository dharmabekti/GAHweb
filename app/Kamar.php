<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'ID_KAMAR';
    public $timestamps = false;
    protected $fillable = ['TEMPAT_TIDUR', 'STAUS_SMOKING', 'STATUS_BOOKING', 'FASILITAS', 'ID_DETIL_KAMAR'];

    public function detilkamar(){
      return $this->belongsTo('App\DetilKamar','ID_DETIL_KAMAR','ID_DETIL_KAMAR');
    }
}
