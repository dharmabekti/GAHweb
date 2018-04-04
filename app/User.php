<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tbl_user';
    // protected $primaryKey = 'id_user';
    protected $fillable = ['id_user', 'username', 'password', 'id_role', 'id_kota'];
}
