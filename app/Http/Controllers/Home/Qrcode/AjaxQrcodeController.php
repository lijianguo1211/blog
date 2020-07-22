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
    protected function getTextQrcodeFile()
    {
        $dir = storage_path('app/public/qrcode');
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $file = $dir. '/download.png';
        if (!file_exists($file)) {
            touch($file);
        }

        return $file;
    }

    public function textQrcode(Request $request)
    {
        if (empty($request->get('text'))) {
            return $this->setCode(50001)
                ->setMessage('待转化的文字为空')
                ->ajaxResponse();
        }

        try {
            if ($request->has('download') && $request->get('download') === 'yes') {
                $html = \QrCode::format('png')->size(200)
                    ->encoding('UTF-8')->generate($request->get('text'), $this->getTextQrcodeFile());
            } else {
                $html = \QrCode::size(200)
                    ->encoding('UTF-8')->generate($request->get('text'));
            }
            //dd($html);
            $result = [
                'data' => $html
            ];
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $result = [
                'message' => $e->getMessage(),
                'status' => false
            ];
        }

        return $this->ajaxResponse($result);
    }
}
