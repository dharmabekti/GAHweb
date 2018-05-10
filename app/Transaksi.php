<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'NO_INVOICE';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['JUMLAH_TARIF', 'JENIS_STATUS', 'TGL_TRANSAKSI', 'ID_BOOKING'];

    public function reservasi(){
      return $this->belongsTo('App\Reservasi','ID_BOOKING','ID_BOOKING');
    }

    public function detilreservasi(){
      return $this->belongsTo('App\DetilReservasi','ID_BOOKING','ID_BOOKING');
    }

    public function detiltransaksi(){
      return $this->belongsTo('App\DetilReservasi','ID_BOOKING','ID_BOOKING');
    }
}
