<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{
    protected $table = "jay_blog_details";

    public $fillable = [
        "blog_id", "content_html", "content_md"
    ];
}
