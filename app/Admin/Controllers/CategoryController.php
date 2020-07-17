<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '发布分类管理';

    const MODEL_NAME = Category::class;


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', __('ID'));
        $grid->column('categories_name', __('table.categoriesName'));
        $grid->column('categories_slug', __('table.categoriesUrl'));
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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('categories_name', __('table.categoriesName'));
        $show->field('categories_slug', __('table.categoriesUrl'));
        $show->field('parent', __('table.parent'));
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
        $form = new Form(new Category());

        $form->text('categories_name', __('table.categoriesName'));
        $form->text('categories_slug', __('table.categoriesUrl'));
        $form->select('parent', __('父级'))->options($this->toNewTree())->default(0);
        $html = <<<ERT
<script>
$("#pjax-container").on("input", "#categories_name", function () {
        let val = $(this).val();

        if (!val) {
            return "";
        }

        $('#categories_name').slugIt({ output: "#categories_slug" });
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
            $result = $model::get(['id', 'categories_name as name', 'parent'])->toArray();
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }
}
