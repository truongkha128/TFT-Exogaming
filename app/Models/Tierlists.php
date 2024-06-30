<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tierlists extends Model
{
    use HasFactory;
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'name',
       'type_gold',
       'description',
       'thumb',
       'thumbnail',
       'type',
       'type_rank',
       'tip',
       'stage2',
       'stage3',
       'stage4',
       'thumb',
       'core',
       'image_team',
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

   public function tierlists_champion()
   {
       return $this->belongsToMany(Champions::class, 'tierlists_champion', 'tierlists_id', 'champions_id');
   }

   public function tierlists_early()
   {
       return $this->belongsToMany(Champions::class, 'tierlists_early', 'tierlists_id', 'champions_id');
   }

   public function tierlists_item()
   {
       return $this->belongsToMany(Items::class, 'tierlists_item', 'tierlists_id', 'items_id');
   }

   public function tierlists_augment()
   {
       return $this->belongsToMany(Augments::class, 'tierlists_augment', 'tierlists_id', 'augments_id');
   }

}
