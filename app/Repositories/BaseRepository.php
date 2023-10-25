<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public static function getTimeElapsedAttribute($created_at, $updated_at)
    {
        // Utilisez Carbon pour obtenir la différence entre created_at et updated_at
        $created_at = Carbon::parse($created_at);
        $updated_at = Carbon::parse($updated_at);

        // Utilisez la méthode diffForHumans() pour obtenir une chaîne lisible par l'homme
        return $created_at->diffForHumans($updated_at);
    }

   

    // Ajoutez d'autres méthodes ici en fonction de vos besoins
}
