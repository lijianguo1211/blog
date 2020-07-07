<?php
/**
 * Notes:
 * File name:BlogServices
 * Create by: Jay.Li
 * Created on: 2020/7/7 0007 13:33
 */


namespace App\Service;


use App\Models\Blog;
use Illuminate\Support\Collection;

class BlogServices implements HomeInterface
{
    private $blog;

    private $postStatus = 2;

    private $isTop = 1;

    private $isNoTop = 0;

    public function __construct()
    {
        $this->blog = new Blog();
    }

    /**
     * @return int
     */
    public function getPostStatus(): int
    {
        return $this->postStatus;
    }

    public function setPostStatus(int $status)
    {
        $this->postStatus = $status;

        return $this;
    }

    public function getData()
    {
        // TODO: Implement getData() method.
        return [
            'topBlog' => $this->isTopBlog(),
            'allBlog' => $this->blogAll()
        ];
    }

    protected function isTopBlog()
    {
        try {
            $result = $this->blog->newQuery()
                ->where('is_top', $this->isTop)
                ->where('post_status', $this->getPostStatus())
                ->orderBy('sort')
                ->with('BlogDetail')
                ->with('tags')
                ->with('categories')
                ->first();

            if (empty($result)) {
                throw new \Exception("置顶文章为空");
            }

            $result = $result->toArray();
        } catch (\Exception $e) {
            $result = [];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }


    protected function blogAll()
    {
        try {
            $result = $this->blog->newQuery()->where('post_status', $this->getPostStatus())
                ->orderBy('sort')
                ->where("is_top", $this->isNoTop)
                ->with('BlogDetail')
                ->with('tags')
                ->with('categories')
                ->limit(9)->get()->toArray();
        } catch (\Exception $e) {
            $result = [];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }
}
