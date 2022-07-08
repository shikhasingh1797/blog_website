<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    public function post(){
        return $this->belongsToMany(Post::class,'posts_tags','tag_id');
    }
    public function getpostsbytag(){
        return $this->belongsTo(Post::class, 'id', 'category_id');
    }
}
