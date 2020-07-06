<?php
/**
 * Notes:
 * File name:HomeLinkService
 * Create by: Jay.Li
 * Created on: 2020/7/6 0006 13:29
 */


namespace App\Service;


use App\Models\Link;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeLinkService implements HomeInterface
{
    private $number = 5;

    private $link;

    public function __construct()
    {
        $this->link = new Link();
    }

    public function setNumber(int $number)
    {
        $this->number = $number;
    }

    public function getLinkData()
    {
        try {
            $result = $this->link->where('status', 1)->orderBy('updated_at', 'desc')
                ->limit($this->number)
                ->get()->toArray();
        } catch (\Exception $e) {
            $result = [];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }

    public function getData()
    {
        // TODO: Implement getData() method.
        $data = $this->getLinkData();

        if (!Cache::has('jay_home_links')) {
            Cache::put('jay_home_links', json_encode($data), 60*60*24);
        }

        return json_decode(Cache::get('jay_home_links'), true);
    }
}
