<?php
/**
 * Notes:
 * File name:AjaxQrcodeController
 * Create by: Jay.Li
 * Created on: 2020/7/20 0020 13:19
 */


namespace App\Http\Controllers\Home\Qrcode;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxQrcodeController extends Controller
{
    public function textQrcode(Request $request)
    {
        dd($request->all());
    }
}
