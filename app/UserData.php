<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
	protected $table = 'user_datas';
	
    protected $fillable = [
    	'user_id','alamat','jenis_kelamin'
    ];
    protected $primaryKey = 'id_user_data';
}
