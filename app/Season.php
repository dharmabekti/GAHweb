<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'season';
    protected $primaryKey = 'ID_SEASON';
    public $timestamps = false;
    protected $fillable = ['NAMA_SEASON'];
}
