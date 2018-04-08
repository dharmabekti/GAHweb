<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $table = 'tarif';
    protected $primaryKey = 'ID_TARIF';
    public $timestamps = false;
    protected $fillable = ['HARGA_TARIF'];
}
