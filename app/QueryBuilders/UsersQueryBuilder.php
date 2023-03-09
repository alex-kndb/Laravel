<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UsersQueryBuilder extends QueryBuilder
{

    public Builder $model;

    public function __construct ()
    {
        $this->model = User::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getOne(int $id) : Model
    {
        return $this->model->find($id);
    }
}
