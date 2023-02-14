<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Source;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class SourcesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Source::query();
    }

    function getAll(): Collection
    {
        return $this->model->get();
    }

    function getOne(int $id): Model
    {
        return $this->model->find($id);
    }
}
