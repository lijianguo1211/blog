<?php
/**
 * Notes:
 * File name:BaseController
 * Create by: Jay.Li
 * Created on: 2020/7/8 0008 9:56
 */


namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Service\HeaderService;
use App\Service\HomeLinkService;
use App\Service\HomeSourceService;

class BaseController extends Controller
{
    protected $shareData = [];

    public function __construct(
        HeaderService $headerService,
        HomeSourceService $sourceService,
        HomeLinkService $linkService
    )
    {
        $header = $headerService->getData();
        $homeSources = $sourceService->getData();
        $links = $linkService->getData();

        $this->shareData = [
            'header' => $header,
            'homeSources' => $homeSources,
            'linkService' => $links,
        ];
    }
}
