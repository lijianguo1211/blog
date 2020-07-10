<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BlogDetail
 *
 * @property int $id
 * @property int $blog_id 文章id
 * @property string $content_html 文章内容 html
 * @property string $content_md 文章内容 md
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $post_content_info
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogDetail whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogDetail whereContentHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogDetail whereContentMd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
