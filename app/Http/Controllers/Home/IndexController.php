<?php


namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Service\BlogServices;
use App\Service\HeaderService;
use App\Service\HomeLinkService;
use App\Service\HomeSourceService;

class IndexController extends Controller
{
    public function index(
        HeaderService $headerService,
        HomeSourceService $sourceService,
        HomeLinkService $linkService,
        BlogServices $blogServices
    )
    {
        $header = $headerService->getData();
        $homeSources = $sourceService->getData();
        $linkService = $linkService->getData();
        $resultBlog = $blogServices->getData();
        //dd($resultBlog);
        //flash('Sorry! Please try again.')->error();
        //flash()->overlay('You are now a Laracasts member!', 'Yay');
        $result = [
            'header' => $header,
            'homeSources' => $homeSources,
            'linkService' => $linkService,
        ];
        return view('home.index.index')->with(array_merge($result, $resultBlog));
    }

    public function test(
        HeaderService $headerService,
        HomeSourceService $sourceService,
        HomeLinkService $linkService
    )
    {
        $header = $headerService->getData();
        $homeSources = $sourceService->getData();
        $linkService = $linkService->getData();
        $result = [
            'header' => $header,
            'homeSources' => $homeSources,
            'linkService' => $linkService,
        ];
        return view('home.diary.index')->with($result);
    }
}
