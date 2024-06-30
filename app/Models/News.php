<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class News.
 *
 * @package namespace App\Models;
 */
class News extends Model implements Transformable
{
    use TransformableTrait;

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
        'category_id',
        'language',
        'user_id',
        'active',
        'linkedin_post_id',
        'linkedin_post_status',
        'file'
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }

    public function websites()
    {
        return $this->belongsToMany(Website::class, 'news_website', 'news_id', 'website_id');
    }
}
