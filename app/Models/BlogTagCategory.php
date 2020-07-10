<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BlogTagCategory
 *
 * @property int $id
 * @property int $blog_id 文章id
 * @property int $term_id 分类或者标签id
 * @property int $type 类型，默认1 为标签， 2为分类
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogTagCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogTagCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogTagCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogTagCategory whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogTagCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogTagCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogTagCategory whereTermId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogTagCategory whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogTagCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlogTagCategory extends Model
{
    protected $table = "jay_blog_tag_categories";

    public $fillable = [
        'blog_id', 'term_id', 'type'
    ];
}
