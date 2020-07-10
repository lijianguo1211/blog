<?php
/**
 * Notes:
 * File name:BlogController
 * Create by: Jay.Li
 * Created on: 2020/7/7 0007 17:49
 */


namespace App\Http\Controllers\Home;

use App\Service\BlogServices;

class BlogController extends BaseController
{
    public function index(BlogServices $blogServices)
    {
        $result = $blogServices->onlyBlogList();

        return view('home.blog.index')->with(array_merge($this->shareData, $result));
    }
}
