<?php


namespace App\Http\Controllers\Home;

use App\Service\BlogServices;

class AjaxBlogController extends BaseAjaxController
{
    public function index(int $page, BlogServices $blogServices)
    {
        $result = $blogServices->onlyBlogList($page);

        return $this->setMessage($this->ajaxBlogHtml($result))->ajaxResponse();
    }
}
