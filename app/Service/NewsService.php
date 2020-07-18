<?php


namespace App\Service;


use App\Models\News;

class NewsService implements HomeInterface
{
    private $news;

    const STATUS = 1;

    const STATUS_NO = 0;

    public function __construct()
    {
        $this->news = new News();
    }

    public function getData()
    {
        // TODO: Implement getData() method.
        try {
            $result = $this->news->where('status', self::STATUS)
                ->orderBy('order')->first();

            if (empty($result)) {
                throw new \Exception('分享数据为空！');
            }

            $result = $result->toArray();
        } catch (\Exception $e) {
            $result = [];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }
}
