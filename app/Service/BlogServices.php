<?php
/**
 * Notes:
 * File name:BlogServices
 * Create by: Jay.Li
 * Created on: 2020/7/7 0007 13:33
 */


namespace App\Service;


use App\Models\Blog;
use Illuminate\Queue\Capsule\Manager;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Enume\IsSeriesEnume;

class BlogServices implements HomeInterface
{
    private $blog;

    private $postStatus = 2;

    private $isTop = 1;

    private $isNoTop = 0;

    private $blogNumber = 9;

    private $rankingNumber = 9;

    private $likesNumber = 9;

    const TAG = 1;

    const CATEGORY = 2;

    public function __construct()
    {
        $this->blog = new Blog();
    }

    public function getBlogNumber()
    {
        return $this->likesNumber;
    }

    public function setBlogNumber(int $number)
    {
        $this->blogNumber = $number;

        return $this;
    }

    public function getLikesNumber()
    {
        return $this->likesNumber;
    }

    public function setLikesNumber(int $number)
    {
        $this->likesNumber = $number;

        return $this;
    }

    /**
     * @return int
     */
    public function getRankingNumber(): int
    {
        return $this->rankingNumber;
    }

    public function setRankingNumber(int $number)
    {
        $this->rankingNumber = $number;
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
        $news = new NewsService();
        return [
            'topBlog' => $this->isTopBlog(),
            'allBlog' => $this->blogAll(),
            'rankingList' => $this->rankingList(),
            'likesList' => $this->likesList(),
            'news' => $news->getData()
        ];
    }


    public function showDetail(int $id)
    {
        $blogDetail = $this->showBlog($id);
        $seriesList = $this->seriesList();
        return [
            'rankingList' => $this->rankingList(),
            'blogDetail' => $blogDetail,
            'likesList' => $this->likesList(),
            'seriesList' => $seriesList
        ];
    }

    public function onlyBlogList(int $offset = 0, bool $isTop = false)
    {
        return ['onlyBlogList' => $this->blogAll($isTop, $offset)];
    }

    public function seriesList()
    {
        try {
                $result = $this->blog->newQuery()
                ->where('is_series', IsSeriesEnume::IS_SERIES)
                ->where('post_status', $this->getPostStatus())
                ->orderBy('sort')
                ->limit($this->blogNumber)
                ->get(['id', 'title', 'reading_volume'])->toArray();
        } catch (\Exception $e) {
            $result = [];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }

    /**
     * Notes: 文章详情数据查询
     * User: LiYi
     * Date: 2020/7/8 0008
     * Time: 13:38
     * @param int $id
     * @return array
     */
    protected function showBlog(int $id)
    {
        try {
            $result = $this->blog->newQuery()
                ->where('id', $id)
                ->where('post_status', $this->getPostStatus())
                ->orderBy('sort')
                ->with(['BlogDetail' => function ($query) {
                    $query->select('blog_id', 'content_html', 'id');
                }])
                ->with(['tags' => function ($query) {
                    $query->where("jay_blog_tag_categories.type", TagOrCategoryService::TAG_TYPE);
                }])
                ->with(['categories' => function ($query) {
                    $query->where("jay_blog_tag_categories.type", TagOrCategoryService::CATEGORY_TYPE);
                }])
                ->first();

            if (empty($result)) {
                throw new \Exception("文章详情数据不存在！！！");
            }

            $result = $result->toArray();
            $this->blog->newQuery()->where('id', $id)->increment('reading_volume');
        } catch (\Exception $e) {
            $result = [];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }

    protected function isTopBlog()
    {
        try {
            $result = $this->blog
                ->append('post_content_info')
                ->where('is_top', $this->isTop)
                ->where('post_status', $this->getPostStatus())
                ->orderBy('sort')
                ->with(['BlogDetail' => function ($query) {
                    $query->select('blog_id', 'content_html', 'id');
                }])
                ->with(['tags' => function ($query) {
                    $query->where("jay_blog_tag_categories.type", TagOrCategoryService::TAG_TYPE);
                }])
                ->with(['categories' => function ($query) {
                    $query->where("jay_blog_tag_categories.type", TagOrCategoryService::CATEGORY_TYPE);
                }])
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


    protected function blogAll(bool $isTopWhere = true, int $offset = 0)
    {
        try {
            $result = $this->blog->append('post_content_info', 'diffTime', 'titleShort')
                ->where('post_status', $this->getPostStatus())
                ->orderBy('sort')
                ->when($isTopWhere, function ($query) {
                    $query->where("is_top", $this->isNoTop);
                })
                ->with(['BlogDetail' => function ($query) {
                    $query->select('blog_id', 'content_html', 'id');
                }])
                ->with(['tags' => function ($query) {
                    $query->where("jay_blog_tag_categories.type", TagOrCategoryService::TAG_TYPE);
                }])
                ->with(['categories' => function ($query) {
                    $query->where("jay_blog_tag_categories.type", TagOrCategoryService::CATEGORY_TYPE);
                }])
                ->limit($this->getBlogNumber())
                ->offset($offset * $this->getBlogNumber())
                ->get()
                ->toArray();
        } catch (\Exception $e) {
            $result = [];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }

    /**
     * Notes: 阅读排行榜
     * User: LiYi
     * Date: 2020/7/8 0008
     * Time: 13:29
     * @return string[]
     */
    protected function rankingList()
    {
        try {
            $result = $this->blog->where('post_status', $this->getPostStatus())
                ->orderByDesc('reading_volume')
                ->limit($this->getRankingNumber())
                ->get(['title', 'id', 'reading_volume'])->toArray();
        } catch (\Exception $e) {
            $result = [
                'id' => 0,
                'title' => '',
            ];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }

    public function likesList()
    {
        try {
            $result = $this->blog->where('post_status', $this->getPostStatus())
                ->orderByDesc('likes_volume')
                ->limit($this->getLikesNumber())
                ->get(['title', 'id', 'likes_volume'])->toArray();
        } catch (\Exception $e) {
            $result = [
                'id' => 0,
                'title' => '',
            ];
            \Log::error(__CLASS__ . ' in ' .__FUNCTION__ . ' error:' . $e->getMessage());
        }

        return $result;
    }


}
