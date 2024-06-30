<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use TCG\Voyager\Traits\Translatable;

/**
 * Class Page.
 *
 * @package namespace App\Models;
 */
class Page extends Model implements Transformable
{
    use TransformableTrait;
    use Translatable;

    protected $translatable = ['title', 'slug', 'description', 'content'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'content',
        'thumb',
        'user_id',
        'website_id',
        'active',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }
}
