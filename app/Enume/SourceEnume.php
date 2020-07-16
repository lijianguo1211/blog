<?php


namespace App\Enume;


class SourceEnume implements EnumeInterface
{
    public static function source(int $id)
    {
        switch ($id){
            case 1:
                $result = '原创';
                break;
            case 2:
                $result = '转载';
                break;
            case 3:
                $result = '翻译';
                break;
            default:
                $result = '未知';
                break;
        }

        return $result;
    }

    public static function toArray()
    {
        // TODO: Implement toArray() method.
        return [1 => '原创', 2 => '翻译', 3 => '转载', 4 => '未知'];
    }
}
