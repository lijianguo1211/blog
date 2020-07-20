<?php
/**
 * Notes:
 * File name:AjaxQrcodeController
 * Create by: Jay.Li
 * Created on: 2020/7/20 0020 13:19
 */


namespace App\Http\Controllers\Home\Qrcode;


use App\Http\Controllers\Home\BaseAjaxController;
use Illuminate\Http\Request;

class AjaxQrcodeController extends BaseAjaxController
{
    public function textQrcode(Request $request)
    {
        if (empty($request->get('text'))) {
            return $this->setCode(50001)
                ->setMessage('待转化的文字为空')
                ->ajaxResponse();
        }

        try {
            $html = \QrCode::size(150)
                ->encoding('UTF-8')
                ->generate($request->get('text'));
            $result = [
                'data' => $html
            ];
        } catch (\Exception $e) {
            $result = [
                'message' => $e->getMessage(),
                'status' => false
            ];
        }

        return $this->ajaxResponse($result);
    }
}
