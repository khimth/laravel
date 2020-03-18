<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'content', 'featured_image', 'category_id', 'slug', 'created_by'
    ];

    protected $dates = ['deleted_at'];

    public function getFeaturedImageAttribute($featured) {
        return asset($featured);
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
