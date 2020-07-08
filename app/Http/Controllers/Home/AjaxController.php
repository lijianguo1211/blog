<?php


namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Service\AjaxService;

class AjaxController extends Controller
{
    public function addLikes(int $id, AjaxService $service)
    {
        return $service->blogDetailAddLikes($id);
    }

    public function removeLikes(int $id, AjaxService $service)
    {
        return $service->blogDetailRemoveLikes($id);
    }
}
