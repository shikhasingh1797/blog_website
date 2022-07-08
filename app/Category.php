<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function getpostsbycategory(){
        return $this->belongsTo(Post::class, 'id', 'category_id');
    }
}
