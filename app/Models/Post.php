<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class , 'post_tags'  )->withPivot('tag_id', 'post_id');
    }
    
    public function getImageAttribute($image)
    {
        return  ($image !=null) ? asset(Storage::url($image)) : asset('images/blog_default.png');
    }

}
