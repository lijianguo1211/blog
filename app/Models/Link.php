<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Link
 *
 * @property int $id
 * @property string $title 友情链接名
 * @property string $title_slug 友情链地址
 * @property int $status 是否展示，默认0不展示，1展示
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereTitleSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Link extends Model
{
    protected $table = 'jay_links';

    public $fillable = [
        'title', 'title_slug'
    ];
}
