<?php
/**
 * Notes:
 * File name:TagOrCategoryService
 * Create by: Jay.Li
 * Created on: 2020/7/17 0017 17:08
 */


namespace App\Service;


use App\Models\BlogTagCategory;

class TagOrCategoryService
{
    private $tagOrCategory;

    const TAG_TYPE = 1;
    const CATEGORY = 1;

    public function __construct()
    {
        $this->tagOrCategory = new BlogTagCategory();
    }

    public function get(int $id)
    {
        try {
            $result = $this->tagOrCategory->where('blog_id', $id)
                ->get(['term_id', 'type'])->toArray();
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }

    protected function encodeData(int $id)
    {
        collect()->where('type', '');
    }
}
