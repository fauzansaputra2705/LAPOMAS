<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';

    protected $fillable = [
    	'id_kategori','nama_kategori'
    ];

    protected $primaryKey = 'id_kategori';
}
