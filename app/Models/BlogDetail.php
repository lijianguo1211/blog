<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{
    protected $table = "jay_blog_details";

    public $fillable = [
        "blog_id", "content_html", "content_md"
    ];

    protected $appends = [
        'post_content_info'
    ];

    public function getPostContentInfoAttribute($value)
    {
        if (empty($this->content_md)) {
            return '...';
        }

        $str = strip_tags($this->content_md);

        return  mb_substr($str, 0, 200) . '...';
    }
}
