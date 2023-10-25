<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    // Ajoutez des méthodes spécifiques aux articles ici

    public function findByName($name)
    {
        return $this->model->where('name', $name)->first();
    }

    public static function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

}