<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ms_menu extends Model
{
    protected $table="ms_menu";
    protected $fillable = [
        'nama_menu', 'gambar', 'harga', 'id_kategori'
    ];
    protected $attributes = [
        'gambar' => null,
    ];
    public function kategori_menu(){
    	return $this->belongsTo(ms_kategorimenu::class,'id_kategori');
    }
}
