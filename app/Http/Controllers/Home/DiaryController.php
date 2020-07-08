<?php
/**
 * Notes:
 * File name:DiaryController
 * Create by: Jay.Li
 * Created on: 2020/7/7 0007 17:51
 */


namespace App\Http\Controllers\Home;

class DiaryController extends BaseController
{
    public function index()
    {
        return view('home.diary.index')->with($this->shareData);
    }
}
