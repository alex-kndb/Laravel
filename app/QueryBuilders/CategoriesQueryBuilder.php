<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CategoriesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getOne(int $id): Model
    {
        return $this->model->find($id);
    }
}
