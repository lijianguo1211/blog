<?php


namespace App\Service;


use App\Models\Blog;

class AjaxService
{
    private $blog;

    public function __construct()
    {
        $this->blog = new Blog();
    }

    public function blogDetailAddLikes(int $id)
    {
        try {
            $result = $this->blog->newQuery()->where('id', $id)->increment('likes_volume');
        } catch (\Exception $e) {
            $result = 0;
        }

        return $this->ajaxToJson(['status' => $result, 'message' => 'success']);
    }

    public function blogDetailRemoveLikes(int $id)
    {
        try {
            $result = $this->blog->newQuery()->where('id', $id)->decrement('likes_volume');
        } catch (\Exception $e) {
            $result = 0;
        }

        return $this->ajaxToJson(['status' => $result, 'message' => 'success']);
    }

    protected function ajaxToJson(array $data)
    {
        return json_encode($data);
    }
}
