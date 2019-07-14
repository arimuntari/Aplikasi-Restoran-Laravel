<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ms_kategorimenu extends Model
{
   protected $table = 'ms_kategorimenu';
   protected $fillable = [
        'nama_kategori'
    ];
}
