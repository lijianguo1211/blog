<?php
/**
 * Notes:
 * File name:CategoryService
 * Create by: Jay.Li
 * Created on: 2020/7/17 0017 16:56
 */


namespace App\Service;


use App\Models\Category;

class CategoryService
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function get()
    {
        try {
            $result = $this->category->pluck('categories_name', 'id')->toArray();
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }
}
