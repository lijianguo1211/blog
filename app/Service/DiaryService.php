<?php
/**
 * Notes:
 * File name:DiaryService
 * Create by: Jay.Li
 * Created on: 2020/7/10 0010 13:38
 */


namespace App\Service;


use App\Models\Diary;

class DiaryService implements HomeInterface
{

    private $diary;

    private $number = 15;

    public function __construct()
    {
        $this->diary = new Diary();
    }

    public function setNumber(int $number)
    {
        $this->number = $number;

        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getData()
    {
        // TODO: Implement getData() method.
        return ['diaryList' => $this->diaryList()];
    }

    public function diaryList()
    {
        try {
            $result = $this->diary->append('diffTime')->orderByDesc('updated_at')
                ->limit($this->getNumber())
                ->get()->toArray();
        } catch (\Exception $e) {
            $result = [];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }
}
