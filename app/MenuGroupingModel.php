<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuGroupingModel extends Model
{
    protected $table = 'menu_grouping';
    protected $fillable = [
        'menu'
    ];
    public function page() {
        return $this->belongsToMany('App\ProdukModel','page_menu','page_id','menu_id');
    }
}
