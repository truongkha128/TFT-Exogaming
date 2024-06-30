<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Augments extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'content',
        'thumb',
        'user_id',
        'type'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}