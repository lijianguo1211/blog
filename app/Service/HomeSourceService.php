<?php
/**
 * Notes:
 * File name:HomeSourceService
 * Create by: Jay.Li
 * Created on: 2020/7/6 0006 10:02
 */


namespace App\Service;


use App\Models\HomeSource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class HomeSourceService implements HomeInterface
{

    private $sources;

    public function __construct()
    {
        $this->sources = new HomeSource();
    }

    public function getData()
    {
        // TODO: Implement getData() method.
        $data = $this->toDaySources();

        if (empty($data)) {
            $data = $this->firstSource();
        }

        if (!Cache::has('jay_home_sources')) {
            Cache::put('jay_home_sources', json_encode($data), 60*60*24);
        }

        return json_decode(Cache::get('jay_home_sources'), true);
    }

    protected function firstSource()
    {
        try {
            $result = $this->sources->orderBy('updated_at', 'desc')->first();

            if (empty($result)) {
                throw new \Exception("首页每日分享为空");
            }
            $result = $result->toArray();
        } catch (\Exception $e) {
            $result = [];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }

    protected function toDaySources()
    {
        try {
            $toDay = Carbon::now()->format('Y-m-d');
            $result = $this->sources->where('updated_at', '>=' , $toDay)->orderBy('updated_at', 'desc')->first();

            if (empty($result)) {
                throw new \Exception($toDay . '今日分享数据为空');
            }

            $result = $result->toArray();
        } catch (\Exception $e) {
            $result = [];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }
}
