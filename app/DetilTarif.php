<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilTarif extends Model
{
    protected $table = 'detil_tarif';
    protected $primaryKey = 'ID_DETIL_TARIF';
    public $timestamps = false;
    protected $fillable = ['ID_ITEM', 'ID_TARIF', 'JUMLAH_ITEM'];

    public function item(){
      return $this->belongsTo('App\Item','ID_ITEM','ID_ITEM');
    }
}
