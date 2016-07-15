<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['title','content','preview','meta_description','meta_keywords','category_id','group_id','comments_enable','public'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
