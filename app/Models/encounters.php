<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class encounters extends Model
{
    use HasFactory;
     /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
    'name',
    'content',
    'option',
    'thumb',
];

public function scopeActive($query)
{
    return $query->where('active', 1);
}

}
