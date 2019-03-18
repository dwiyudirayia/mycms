<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikelModel extends Model
{
    protected $table = 'kategori_artikel';
    protected $fillable = [
        'users_id','nama','status_kategori','status_kategori'
    ];

    public function artikel() {
        return $this->belongsTo('\App\ArtikelModel');
    }
}
