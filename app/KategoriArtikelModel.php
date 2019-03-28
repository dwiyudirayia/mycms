<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class KategoriArtikelModel extends Model
{
    use HasRoles;

    protected $guard_name = 'web';
    protected $table = 'kategori_artikel';
    protected $fillable = [
        'users_id','nama','status_kategori'
    ];

    public function artikel() {
        return $this->belongsTo('\App\ArtikelModel');
    }
}
