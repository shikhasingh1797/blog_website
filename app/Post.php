<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    // public function user(){
    //     return $this->belongsTo('App\User');
    // }
    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function comment(){
        return $this->hasMany(Comment::class,'post_id','id');
    }
    public function tag(){
        return $this->belongsToMany(Tags::class,'posts_tags','post_id','tag_id');
    }

}
