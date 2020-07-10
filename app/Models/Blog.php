<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blog
 *
 * @property int $id
 * @property string $title 文章标题
 * @property string|null $img_path 文章封面图
 * @property string|null $key_word 友好搜索的关键词
 * @property int $reading_volume 阅读量
 * @property int $likes_volume 点赞量
 * @property int $user_id 作者, 默认为0，代表匿名
 * @property int $sort 排序
 * @property int $post_status 文章状态：1草稿， 2 发布， 3 预发布 4 关闭， 5下架
 * @property int $source 文章类型，默认为1，原创，2转载， 3翻译
 * @property int $is_series 是否是系列文章，默认0，不是，1是系列文章
 * @property int $is_top 是否置顶，默认0，1置顶
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BlogDetail|null $BlogDetail
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereImgPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereIsSeries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereIsTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereKeyWord($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereLikesVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog wherePostStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereReadingVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog whereUserId($value)
 * @mixin \Eloquent
 */
class Blog extends Model
{
    protected $table = "jay_blogs";

    public $fillable = [
        "title", "img_path", "key_word", "user_id", "sort", "post_status",
        "source", "is_series", "is_top"
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('LL') .  ' by';
    }

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
