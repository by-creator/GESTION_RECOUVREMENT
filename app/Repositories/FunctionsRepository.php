<?php

namespace App\Repositories;

use App\Models\Functions;

class FunctionsRepository extends BaseRepository
{
    public function __construct(Functions $model)
    {
        parent::__construct($model);
    }
    // Ajoutez des méthodes spécifiques aux articles ici

    public function findByName($name)
    {
        return $this->model->where('name', $name)->first();
    }

}