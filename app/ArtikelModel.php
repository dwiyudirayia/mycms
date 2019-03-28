<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class ArtikelModel extends Model
{
    use HasRoles;

    protected $guard_name = 'web';
    protected $table = 'artikel';
    protected $fillable = [
        'kategori_id','users_id','judul','headerImage','isi','status_artikel'
    ];

    public function kategoriArtikel() {
        return $this->hasMany('App\KategoriArtikelModel','id');
    }
}
