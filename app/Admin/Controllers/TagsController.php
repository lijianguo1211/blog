<?php

namespace App\Admin\Controllers;

use App\Models\Tag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TagsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '发布标签管理';

    const MODEL_NAME = Tag::class;

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tag());
        $grid->model()->orderBy('id', 'desc');
        $grid->column('id', __('ID'));
        $grid->column('tag_name', __('table.tagName'));
        $grid->column('tag_slug', __('table.tagUrl'));
        $grid->column('parent', __('table.parent'));

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
        $show = new Show(Tag::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tag_name', __('table.tagName'));
        $show->field('tag_slug', __('table.tagUrl'));
        $show->field('parent', __('table.parent'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Tag());

        $form->text('tag_name', __('table.tagName'));
        $form->text('tag_slug', __('table.tagUrl'));
        $form->select('parent', __('table.parent'))->options($this->toNewTree())->default(0);

        $html = <<<ERT
<script>
$("#pjax-container").on("input", "#tag_name", function () {
        let val = $(this).val();

        if (!val) {
            return "";
        }

        $('#tag_name').slugIt({ output: "#tag_slug" });
    });
</script>

ERT;
        $form->html($html);

        return $form;
    }

    protected function allNodes()
    {
        try {
            $model = self::MODEL_NAME;
            $result = $model::get(['id', 'tag_name as name', 'parent'])->toArray();
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }
}
