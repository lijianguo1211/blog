<?php


namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Service\HeaderService;
use App\Service\HomeLinkService;
use App\Service\HomeSourceService;

class IndexController extends Controller
{
    public function index(HeaderService $headerService, HomeSourceService $sourceService, HomeLinkService $linkService)
    {
        $header = $headerService->getData();
        $homeSources = $sourceService->getData();
        $linkService = $linkService->getData();
        return view('home.index.index')->with([
            'header' => $header,
            'homeSources' => $homeSources,
            'linkService' => $linkService
        ]);
    }

    public function test()
    {
        return view('home.index.test');
    }
}
