<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans';

    protected $fillable = [
 		'id_laporan','kategori_id','user_id','isi_laporan','tanggal_laporan','foto','status_laporan'
    ];

    protected $primaryKey = 'id_laporan';
}
