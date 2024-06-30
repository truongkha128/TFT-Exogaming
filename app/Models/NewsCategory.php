<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class NewsCategory.
 *
 * @package namespace App\Models;
 */
class NewsCategory extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'active'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function parent()
    {
        return $this->belongsTo(NewsCategory::class, 'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(NewsCategory::class,  'parent_id', 'id')->active();
    }
}
