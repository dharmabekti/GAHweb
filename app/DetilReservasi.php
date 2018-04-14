<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilReservasi extends Model
{
    protected $table = 'detil_reservasi';
    protected $primaryKey = 'ID_DETIL_RESERVASI';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['JENIS_TAMU','JUMLAH_TAMU','STATUS_BATAL','JUMLAH_KAMAR','JUMLAH_ANAK','JUMLAH_DEWASA','ID_BOOKING'];

    public function reservasi(){
      return $this->belongsTo('App\Reservasi','ID_BOOKING','ID_BOOKING');
    }
}
