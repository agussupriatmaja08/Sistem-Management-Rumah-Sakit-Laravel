<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;

    public static function  cari($slug){
        $artikels = static::all();

        

        return  [$artikels->firstWhere('slug', $slug)];
    }
    
    
}
