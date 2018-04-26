<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilKamar extends Model
{
    protected $table = 'detil_kamar';
    protected $primaryKey = 'ID_DETIL_KAMAR';
    public $timestamps = false;
    protected $fillable = ['NAMA_KAMAR', 'JUMLAH_KAMAR', 'FASILITAS'];
}
