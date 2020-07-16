<?php


namespace App\Enume;


class PostStatusEnume implements EnumeInterface
{
    public static function status(int $id)
    {
        switch ($id) {
            case 1:
                $result = '草稿';
                break;
            case 2:
                $result = '发布';
                break;
            case 3:
                $result = '预发布';
                break;
            case 4:
                $result = '关闭';
                break;
            case 5:
                $result = '下架';
                break;
            default:
                $result = '不存在';
                break;
        }

        return $result;
    }

    public static function toArray()
    {
        // TODO: Implement toArray() method.
        return [
            1 => '草稿', 2 => '发布', 3 => '预发布', 4 => '关闭', 5 => '下架'
        ];
    }
}
