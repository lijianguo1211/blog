<?php


namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Service\HeaderService;

class IndexController extends Controller
{
    public function index(HeaderService $headerService)
    {
        $header = $headerService->getData();
        return view('home.index.index')->with(['header' => $header]);
    }
}
