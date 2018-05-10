<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckInOut extends Model
{
    protected $table = 'checkin_checkout';
    protected $primaryKey = 'ID_RESERVASI';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['TGL_CHECKIN', 'TGL_CHECKOUT', 'DEPOSIT', 'CASH', 'ID_BOOKING'];

    public function reservasi(){
      return $this->belongsTo('App\Reservasi','ID_BOOKING','ID_BOOKING');
    }
}
