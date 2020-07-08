<?php


namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Service\BlogServices;
use App\Service\HeaderService;
use App\Service\HomeLinkService;
use App\Service\HomeSourceService;

class IndexController extends BaseController
{
    public function index(BlogServices $blogServices)
    {
        $resultBlog = $blogServices->getData();
        return view('home.index.index')->with(array_merge($this->shareData, $resultBlog));
    }
}
