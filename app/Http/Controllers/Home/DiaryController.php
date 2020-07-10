<?php
/**
 * Notes:
 * File name:DiaryController
 * Create by: Jay.Li
 * Created on: 2020/7/7 0007 17:51
 */


namespace App\Http\Controllers\Home;

use App\Service\DiaryService;

class DiaryController extends BaseController
{
    public function index(DiaryService $diaryService)
    {
        $result = $diaryService->getData();

        return view('home.diary.index')->with(array_merge($this->shareData, $result));
    }
}
