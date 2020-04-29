<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapans';
    
    protected $fillable = [
    	'laporan_id','user_id','tanggal_tanggapan','tanggapan'
    ];

    protected $primaryKey = 'id_tanggapan';
}
