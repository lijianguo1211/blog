<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTagCategory extends Model
{
    protected $table = "jay_blog_tag_categories";

    public $fillable = [
        'blog_id', 'term_id', 'type'
    ];
}
