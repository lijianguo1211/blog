<?php


namespace App\Enume;


class IsSeriesEnume implements EnumeInterface
{
    const IS_SERIES = 1;

    const IS_NO_SERIES = 0;

    public static function toArray()
    {
        return [0 => '非系列', 1 => '系列', 2 => '杂记'];
    }

    public static function isSeries(int $id)
    {
        switch ($id) {
            case 0:
                $result = "非系列";
                break;
            case 1:
                $result = "系列";
                break;
            default:
                $result = "杂记";
                break;
        }

        return $result;
    }
}
