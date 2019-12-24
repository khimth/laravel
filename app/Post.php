<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'content', 'featured_image', 'category_id', 'slug'
    ];

    protected $dates = ['deleted_at'];

    public function getFeaturedImageAttribute($featured) {
        return asset($featured);
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        $this->belongsToMany('App\Tag');
    }
}
