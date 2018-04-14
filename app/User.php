<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'ID_USER';
    public $timestamps = false;
    protected $fillable = ['USERNAME', 'PASSWORD', 'ID_ROLE', 'ID_KOTA'];

    public function role(){
      return $this->belongsTo('App\Role','ID_ROLE','ID_ROLE');
    }

    public function kota(){
      return $this->belongsTo('App\kota','ID_KOTA','ID_KOTA');
    }
}
