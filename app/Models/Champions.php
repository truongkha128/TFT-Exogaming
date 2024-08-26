<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Champions extends Model
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
       'skill',
       'image_skill',
       'thumb',
       'thumbnail',
       'type',
       'star',
       'user_id',
   ];

   public function scopeActive($query)
   {
       return $query->where('active', 1);
   }

   public function user()
   {
       return $this->belongsTo(User::class, 'user_id');
   }

   public function item()
   {
       return $this->belongsToMany(Items::class, 'champions_item', 'champions_id', 'items_id');
   }


   public function augment()
   {
       return $this->belongsToMany(Augments::class, 'champions_augment', 'champions_id', 'augments_id');
   }

   public function trait()
   {
       return $this->belongsToMany(Traits::class, 'champions_trait', 'champions_id', 'traits_id');
   }

}
