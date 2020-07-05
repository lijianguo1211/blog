<?php


namespace App\Service;

use App\Models\Header;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class HeaderService implements HomeInterface
{
    private $header;

    public function __construct()
    {
        $this->header = new Header();
    }

    protected function noEmptyParent()
    {

    }

    protected function emptyParent()
    {
        try {
            $result = $this->header->where('parent', 0)
                ->where('status', 1)
                ->where('deleted_at', 0)
                ->orderBy('sort')
                ->get(['header_name', 'header_url'])
                ->toArray();
        } catch (\Exception $e) {
            Log::error("在 " . __FILE__ . " 文件," . __CLASS__ . '类, 第 ' . $e->getLine() . '行 出错：' . $e->getMessage());
            $result = [];
        }

        return $result;
    }


    /**
     * Notes: 提供头部数据
     * Name: getData
     * User: LiYi
     * Date: 2020/7/5
     * Time: 22:15
     * @param bool $type
     * @return array|void
     */
    public function getData(bool $type = true)
    {
        // TODO: Implement getData() method.
        if ($type) {
            $data = $this->emptyParent();
        } else {
            $data = $this->noEmptyParent();
        }

        if (!Cache::has('jay_home_header_'.(int)$type)) {
            Cache::put('jay_home_header_'.(int)$type, json_encode($data), 60*60*24);
        }

        return json_decode(Cache::get('jay_home_header_'.(int)$type), true);
    }
}
