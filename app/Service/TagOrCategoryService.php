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

    const CATEGORY_TYPE = 2;

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

    public function encodeData(int $id)
    {
        $data = $this->get($id);

        $tag = collect($data)->where('type', self::TAG_TYPE)->pluck('term_id')->all();

        $category = collect($data)->where('type', self::CATEGORY_TYPE)->implode('term_id');

        return [
            'tag' => $tag,
            'category' => $category,
        ];
    }

    public function create(array $data)
    {
        try {
            $result = $this->tagOrCategory->create($data);
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }

    public function createMultiple(array $data)
    {
        try {
            $result = $this->tagOrCategory->insert($data);
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }

    public function delete(int $id)
    {
        try {
            $result = $this->tagOrCategory->where('blog_id', $id)->delete();
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }
}
