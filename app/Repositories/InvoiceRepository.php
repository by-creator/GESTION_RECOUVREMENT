<?php

namespace App\Repositories;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoiceRepository extends BaseRepository
{
    public function __construct(Invoice $model)
    {
        parent::__construct($model);
    }
    // Ajoutez des méthodes spécifiques aux articles ici

    public function findByName($name)
    {
        return $this->model->where('name', $name)->first();
    }

    public static function getInvoiceByUser($email)
    {
        $user = UserRepository::findByEmail($email);
        return Invoice::where('users_id', $user->id)->get();
    }

    public function getInvoiceNumber()
    {
        $invoice = Invoice::all();

        

    }

}