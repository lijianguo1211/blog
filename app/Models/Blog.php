<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "jay_blogs";

    public $fillable = [
        "title", "img_path", "key_word", "user_id", "sort", "post_status",
        "source", "is_series", "is_top"
    ];

    public function BlogDetail()
    {
        return $this->hasOne(BlogDetail::class, 'blog_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'jay_blog_tag_categories',
            'blog_id',
            'term_id'
            );
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'jay_blog_tag_categories',
            'blog_id',
            'term_id'
        );
    }
}
