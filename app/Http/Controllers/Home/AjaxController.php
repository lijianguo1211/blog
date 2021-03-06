<?php


namespace App\Http\Controllers\Home;

use App\Service\AjaxService;
use Illuminate\Http\Request;

class AjaxController extends BaseAjaxController
{
    public function addLikes(int $id, AjaxService $service)
    {
        return $service->blogDetailAddLikes($id);
    }

    public function removeLikes(int $id, AjaxService $service)
    {
        return $service->blogDetailRemoveLikes($id);
    }

    public function comment(int $id, Request $request, AjaxService $service)
    {
        $data = $request->all();

        return $service->comment($id, $data);
    }
}


