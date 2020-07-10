<?php
/**
 * Notes:
 * File name:Diary
 * Create by: Jay.Li
 * Created on: 2020/7/7 0007 17:54
 */


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Diary
 *
 * @property int $id
 * @property string $title 日记主题
 * @property string $img_path 日记配图
 * @property string $content 日记内容
 * @property string $nick_name 选择匿名，使用昵称显示
 * @property string $ip ip地址记录
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Diary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Diary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Diary query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Diary whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Diary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Diary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Diary whereImgPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Diary whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Diary whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Diary whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Diary whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Diary extends Model
{
    protected $table = "jay_diary";

    protected $appends = [
        'diffTime'
    ];

    public $fillable = [
        'title',
        'img_path',
        'content',
        'nick_name',
        'ip',
    ];

    public function getDiffTimeAttribute($value)
    {
        return Carbon::parse($this->updated_at)->locale('zh_CN')->diffForHumans();
    }
}
