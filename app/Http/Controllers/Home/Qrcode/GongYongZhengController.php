<?php


namespace App\Http\Controllers\Home\Qrcode;


use App\Http\Controllers\Home\BaseController;

class GongYongZhengController extends BaseController
{
    public function index()
    {
        return view('home.qrcode.gyz.index')->with($this->shareData);
    }
}
