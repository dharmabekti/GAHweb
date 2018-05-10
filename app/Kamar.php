<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'ID_KAMAR';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['TEMPAT_TIDUR', 'STAUS_SMOKING', 'STATUS_BOOKING', 'ID_DETIL_KAMAR', 'ID_TARIF_SEASON'];

    public function detilkamar(){
      return $this->belongsTo('App\DetilKamar','ID_DETIL_KAMAR','ID_DETIL_KAMAR');
    }

    public function tarifkamar(){
      return $this->belongsTo('App\TarifSeason','ID_TARIF_SEASON','ID_TARIF_SEASON');
    }

    public function reservasi(){
      return $this->belongsTo('App\Reservasi','ID_KAMAR','ID_KAMAR');
    }
}
