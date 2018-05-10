<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'ID_ITEM';
    public $timestamps = false;
    protected $fillable = ['NAMA_ITEM', 'HARGA_ITEM'];
}
