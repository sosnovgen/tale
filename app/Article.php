<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['title','content','preview','meta_description','meta_keywords','category_id','group_id','comments_enable','cena','public'];


    public function comments()
        {
            return $this->hasMany(Comment::class);
        }

    public function category()
        {
            return $this->belongsTo('App\Category', 'category_id');
        }


    public function group()
        {
            return $this->belongsTo('App\Group', 'group_id');
        }







}
