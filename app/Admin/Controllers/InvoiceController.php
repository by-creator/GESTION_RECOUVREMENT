<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Models\State;
use \App\Models\Invoice;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use OpenAdmin\Admin\Controllers\AdminController;

class InvoiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Invoice';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Invoice());

        $grid->column('id', __('Id'))->filter('like');
        $grid->column('invoice_number', __('Invoice number'))->filter('like');
        $grid->column('users_id', __('User'))->display(
            function ($users_id) {
                $users = User::find($users_id);
                return $users ? $users->name : 'USER NOT FOUND';
            }
        )->filter('like');
        $grid->column('states_id', __('State'))->display(
            function ($states_id) {
                $states = State::find($states_id);
                return $states ? $states->name : 'STATE NOT FOUND';
            }
        )->filter([
            1 => 'PAYÉ',
            2 => 'EN ATTENTE DE VALIDATION ',
            3 => 'IMPAYÉ ',

        ]);
        $grid->column('amount', __('Amount'))->filter('like');
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
        $show = new Show(Invoice::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('invoice_number', __('Invoice number'));
        $show->field('users_id', __('User'));
        $show->field('months_id', __('Month'));
        $show->field('states_id', __('State'));
        $show->field('amount', __('Amount'));
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
        $form = new Form(new Invoice());

        $form->text('invoice_number', __('Invoice number'));
        $form->select('users_id', __('User'))->options(User::all()->pluck('name', 'id'));
        $form->select('states_id', __('State'))->options(State::all()->pluck('name', 'id'));
        $form->text('amount', __('Amount'));

        return $form;
    }
}
