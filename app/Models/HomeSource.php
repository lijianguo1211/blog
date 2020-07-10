<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HomeSource
 *
 * @property int $id
 * @property string $theme 主题
 * @property string $content 内容
 * @property string|null $author 作者
 * @property string $from_there 出处
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HomeSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HomeSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HomeSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HomeSource whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HomeSource whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HomeSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HomeSource whereFromThere($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HomeSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HomeSource whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\HomeSource whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HomeSource extends Model
{
    protected $table = 'jay_home_sources';

    public $fillable = [
        'theme',
        'content',
        'author',
        'from_there'
    ];
}
