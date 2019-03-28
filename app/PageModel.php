<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class PageModel extends Model
{
    use HasRoles;

    protected $guard_name = 'web';
    protected $table = 'page';
    protected $fillable = [
        'judul','isi'
    ];

    public function menu()
    {
        return $this->belongsToMany('App\MenuGroupingModel','page_menu','page_id','menu_id');
    }
}
