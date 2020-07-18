<?php

namespace App\Admin\Controllers;

use App\Models\News;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'News';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News());

        $grid->column('id', __('ID'));
        $grid->column('title', __('table.newsTitle'));
        $grid->column('content', __('table.newsContent'));
        $grid->column('slug', __('table.newsSlug'));
        $grid->column('order', __('table.newsOrder'));
        $grid->column('status', __('table.newsStatus'));

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
        $show = new Show(News::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('table.newsTitle'));
        $show->field('content', __('table.newsContent'));
        $show->field('slug', __('table.newsSlug'));
        $show->field('order', __('table.newsOrder'));
        $show->field('status', __('table.newsStatus'));
        $show->field('created_at', __('table.createdAt'));
        $show->field('updated_at', __('table.updatedAt'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new News());

        $form->text('title', __('table.newsTitle'));
        $form->textarea('content', __('table.newsContent'));
        $form->url('slug', __('table.newsSlug'));
        $form->text('order', __('table.newsOrder'));
        $form->switch('status', __('table.newsStatus'));

        return $form;
    }
}
