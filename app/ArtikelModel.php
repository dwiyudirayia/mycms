<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $fillable = [
        'kategori_id','users_id','judul','headerImage','isi','status_artikel'
    ];

    public function kategoriArtikel() {
        return $this->hasMany('App\KategoriArtikelModel','id');
    }
}
