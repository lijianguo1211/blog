<?php


namespace App\Http\Controllers\Home;

use App\Service\BlogServices;

class AjaxHomeController extends BaseAjaxController
{
    public function index(int $page, BlogServices $blogServices)
    {
        $result = $blogServices->onlyBlogList($page, true);

        return $this->setMessage($this->ajaxHomeHtml($result))->ajaxResponse();
    }
}
