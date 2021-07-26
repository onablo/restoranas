<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function menuRestaurants()
    {
        return $this->hasMany('App\Models\Restaurant', 'menu_id', 'id');
    }
 

    use HasFactory;
}
