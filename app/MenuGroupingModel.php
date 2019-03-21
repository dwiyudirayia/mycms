<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuGroupingModel extends Model
{
    protected $table = 'menu_grouping';
    protected $fillable = [
        'menu'
    ];
}
