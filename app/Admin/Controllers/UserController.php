<?php

namespace App\Admin\Controllers;

use \App\Models\User;
use App\Models\Functions;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use OpenAdmin\Admin\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'))->filter('like');
        $grid->column('functions_id', __('Function'))->display(function ($functions_id) {
            $functions = Functions::find($functions_id);
            return $functions ? $functions->name : 'FUNCTION NOT FOUND';
        }
    )->filter([
        1 => 'ADMIN',
        2 => 'SUPER',
        3 => 'CLIENT',
        
    ]);
        $grid->column('name', __('Name'))->filter('like');
        $grid->column('phone', __('Phone'))->filter('like');
        $grid->column('email', __('Email'))->filter('like');
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('password', __('Password'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'))->filter('datetime');
        $grid->column('updated_at', __('Updated at'))->filter('datetime');

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('functions_id', __('Function'));
        $show->field('name', __('Name'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->select('functions_id', __('Function'))->options(Functions::all()->pluck('name', 'id'));
        $form->text('name', __('Name'));
        $form->text('phone', __('Phone'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
