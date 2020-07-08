<?php
/**
 * Notes:
 * File name:BlogDetailController
 * Create by: Jay.Li
 * Created on: 2020/7/8 0008 13:42
 */


namespace App\Http\Controllers\Home;


use App\Service\BlogServices;

class BlogDetailController extends BaseController
{
    public function index(int $id, BlogServices $services)
    {
        $result = $services->showDetail($id);

        return view('home.blog_detail.index')->with(array_merge($this->shareData, $result));
    }
}
