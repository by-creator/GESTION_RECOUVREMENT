<?php

namespace App\Repositories;

use App\Models\State;

class StateRepository extends BaseRepository
{
    public function __construct(State $model)
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
        return State::where('id', $id)->first();
    }

}