<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $primaryKey = 'ID_KOTA';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['NAMA_KOTA'];
}
