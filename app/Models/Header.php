<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Header
 *
 * @property int $id
 * @property string $header_name 网站头部标题
 * @property string $header_url 跳转地址
 * @property int $parent 分类父id
 * @property int $sort 排序
 * @property int $status 是否展示，默认不展示
 * @property int $user_id 最新操作人
 * @property int $deleted_at 是否删除。默认为0，不删除，1删除
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header whereHeaderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header whereHeaderUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Header whereUserId($value)
 * @mixin \Eloquent
 */
class Header extends Model
{
    protected $table = 'jay_headers';
}
