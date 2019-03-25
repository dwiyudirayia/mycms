<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    protected $table = 'page';
    protected $fillable = [
        'judul','isi'
    ];

    public function menu()
    {
        return $this->belongsToMany('App\MenuGroupingModel','page_menu','page_id','menu_id');
    }
}
