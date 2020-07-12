<?php


namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Traits\AjaxEncode;

class BaseAjaxController extends Controller
{
    use AjaxEncode;

    public function __construct()
    {
        $this->middleware('throttle:60,1');
    }
}
