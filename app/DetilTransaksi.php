<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilTransaksi extends Model
{
    protected $table = 'detil_transaksi_pembayaran';
    protected $primaryKey = 'ID_DETIL_TRANSAKSI';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['JENIS_PEMBAYARAN', 'NOMOR_KARTU_KREDIT', 'NO_INVOICE'];
}
