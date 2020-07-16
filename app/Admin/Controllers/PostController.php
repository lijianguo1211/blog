<?php

namespace App\Admin\Controllers;

use App\Enume\IsSeriesEnume;
use App\Enume\PostStatusEnume;
use App\Enume\SourceEnume;
use App\Models\Blog;
use App\Models\BlogDetail;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Parsedown;

class PostController extends BaseController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Blog());

        $grid->column('id', __('Id'));
        $grid->column('title', __('标题'));
        //$grid->column('img_path', __('Img path'));
        $grid->column('key_word', __('关键字'));
        $grid->column('reading_volume', __('阅读量'));
        $grid->column('likes_volume', __('点击量'));
//        $grid->column('user_id', __('User id'));
        $grid->column('sort', __('排序'));
        $grid->column('post_status', __('发布状态'))->display(function ($post_status) {
            return PostStatusEnume::status($post_status);
        });
        $grid->column('source', __('类型'))->display(function ($source) {
            return SourceEnume::source($source);
        });
        $grid->column('is_series', __('系列'))->display(function ($is_series) {
            return IsSeriesEnume::isSeries($is_series);
        });
        $grid->column('is_top', __('置顶'))->display(function ($is_top) {
            return $is_top == 1 ? "是" : "否";
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Blog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('标题'));
        //$show->field('img_path', __('Img path'));
        $show->field('key_word', __('关键字'));
        $show->field('reading_volume', __('阅读量'));
        $show->field('likes_volume', __('点击量'));
//        $show->field('user_id', __('User id'));
        $show->field('sort', __('排序'));
        $show->field('post_status', __('发布状态'));
        $show->field('source', __('类型'));
        $show->field('is_series', __('系类'));
        $show->field('is_top', __('是否推荐'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @param int $id
     * @return Form
     */
    protected function form(int $id)
    {
        $form = new Form(new Blog());

        if ($id) {
            $defaultM = Blog::where('id', $id)
                ->with('BlogDetail')->first()->toArray();

            $title = $defaultM['title'];
            $key_word = $defaultM['key_word'];
            $sort = $defaultM['sort'];
            $post_status = $defaultM['post_status'];
            $source = $defaultM['source'];
            $is_series = $defaultM['is_series'];
            $is_top = $defaultM['is_top'];
            $content_md = $defaultM['blog_detail']['content_md'];
        } else {
            $title = $key_word = $sort = $post_status = $source = $is_series = $is_top = $content_md = "";
        }

        $form->text('title', __('文章标题'))->default($title);
        $form->image('img_path', __('文章缩略图'));
        $form->text('key_word', __('关键字'))->default($key_word);

        $form->editormd('content_md', '文章内容')->default($content_md);
        $form->number('sort', __('排序'))->default($sort);
        $form->select('post_status', __('发布状态'))
            ->options(PostStatusEnume::toArray())
            ->default($post_status);
        $form->select('source', __('类型'))
            ->options(SourceEnume::toArray())->default($source);
        $form->select('is_series', __('系列选择'))
            ->options(IsSeriesEnume::toArray())->default($is_series);
        $form->switch('is_top', __('是否置顶'))->default($is_top);

        if (!$id) {
            $form->setAction(route('admin.post.store'));
        } else {
            $form->setAction(route('admin.post.update', ['id' => $id]));
        }

        return $form;
    }

    public function store(Blog $blog, BlogDetail $blogDetail, Parsedown $parsedown)
    {
        $postDetail = [
            'blog_id' => 0,
            'content_html' => $parsedown->text(request('content_md')),
            'content_md' => request('content_md'),
        ];

        try {
            $resultBlog = $blog->create($this->fillData(request()->all(), $blog));

            if (empty($resultBlog)) {
                throw new \Exception('error!');
            }
            $postDetail['blog_id'] = $resultBlog->id;

            $blogDetail->create($postDetail);

            $result = ['message' => 'success', 'code' => 200];
        } catch (\Exception $e) {
            $result = ['message' => $e->getMessage(), 'code' => 50001];
        }

        if ($result['code'] === 200) {
            return redirect()->to(route('admin.post.index'));
        } else {
            return redirect()->back();
        }
    }

    public function update(int $id, Blog $blog, BlogDetail $blogDetail, Parsedown $parsedown)
    {
        try {
            $postDetail = [
                'content_html' => $parsedown->text(request('content_md')),
                'content_md' => request('content_md'),
            ];

            $model = $blogDetail->find($id);
            foreach ($postDetail as $key => $item) {
                $model->$key = $item;
            }
            $model->save();
            $data = $this->fillData(request()->all(), $blog);

            $model = $blog->find($id);

            foreach ($data as $key => $item) {
                $model->$key = $item;
            }

            $model->save();

            $result = ['message' => 'success', 'code' => 200];
        } catch (\Exception $e) {
            $result = ['message' => $e->getMessage(), 'code' => 50001];
        }

        if ($result['code'] === 200) {
            return redirect()->to(route('admin.post.index'));
        } else {
            return redirect()->back();
        }
    }

    protected function fillData(array $data, Blog $blog)
    {
        foreach ($data as $key => $item) {
            if (!array_search($key, $blog->fillable)) {
                unset($data[$key]);
            }

            if ($key === 'is_top') {
                $data[$key] = ($item === 'on' ? 1 : 0);
            }

            if ($key === 'img_path') {
                $data[$key] = \Storage::disk('jay')
                    ->putFile('/jay/blog/' . date('Y-m-d') , request()->file('img_path'));
            }
        }
        $data['title'] = request('title');
        return $data;
    }
}
