<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifSeason extends Model
{
    protected $table = 'tarif_season';
    protected $primaryKey = 'ID_TARIF_SEASON';
    public $timestamps = false;
    protected $fillable = ['TGL_MULAI', 'TGL_SELESAI', 'ID_SEASON', 'HARGA_KAMAR'];

    public function season(){
      return $this->belongsTo('App\Season','ID_SEASON','ID_SEASON');
    }
}
