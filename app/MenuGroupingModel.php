<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class MenuGroupingModel extends Model
{
    use HasRoles;

    protected $guard_name = 'web';
    protected $table = 'menu_grouping';
    protected $fillable = [
        'menu'
    ];
    public function page() {
        return $this->belongsToMany('App\ProdukModel','page_menu','page_id','menu_id');
    }
}
