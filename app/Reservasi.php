<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    protected $primaryKey = 'ID_BOOKING';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['TGL_RESERVASI','ID_KAMAR','ID_DATA_DIRI','ID_KOTA','ID_TARIF','ID_DELETED'];

    public function kamar(){
      return $this->belongsTo('App\Kamar','ID_KAMAR','ID_KAMAR');
    }

    public function datadiri(){
      return $this->belongsTo('App\DataDiri','ID_DATA_DIRI','ID_DATA_DIRI');
    }

    public function kota(){
      return $this->belongsTo('App\Kota','ID_KOTA','ID_KOTA');
    }

    public function tarif(){
      return $this->belongsTo('App\Tarif','ID_TARIF','ID_TARIF');
    }

    public function detilreservasi(){
      return $this->belongsTo('App\DetilReservasi','ID_BOOKING','ID_BOOKING');
    }

    public function checkinout(){
      return $this->belongsTo('App\CheckInOut','ID_BOOKING','ID_BOOKING');
    }

    public function transaksi(){
      return $this->belongsTo('App\Transaksi','ID_BOOKING','ID_BOOKING');
    }

    public function ekstraitem(){
      return $this->belongsTo('App\DetilTarif','ID_TARIF','ID_TARIF');
    }
}
