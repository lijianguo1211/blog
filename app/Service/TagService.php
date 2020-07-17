<?php
/**
 * Notes:
 * File name:TagService
 * Create by: Jay.Li
 * Created on: 2020/7/17 0017 16:56
 */


namespace App\Service;


use App\Models\Tag;

class TagService
{
    private $tag;

    public function __construct()
    {
        $this->tag = new Tag();
    }

    public function get()
    {
        try {
            $result = $this->tag->pluck('tag_name', 'id')->toArray();
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }
}
