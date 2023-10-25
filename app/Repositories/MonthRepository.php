<?php

namespace App\Repositories;

use App\Models\Month;

class MonthRepository extends BaseRepository
{
    public function __construct(Month $model)
    {
        parent::__construct($model);
    }
    // Ajoutez des méthodes spécifiques aux articles ici

    public function findByName($name)
    {
        return $this->model->where('name', $name)->first();
    }

    public static function findById($id)
    {
        return Month::where('id', $id)->first();
    }

}