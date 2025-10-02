<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = ['content','user_id','image','user_id'];

     public function user()
     {
         return $this->belongsTo(User::class, 'user_id');
     }
     // public function comment()
     // {
     //     return $this->hasMany(Comment::class);
     // }
     // public function likes(
     //        return $this->hasMany(Like::class);
     // )
}
