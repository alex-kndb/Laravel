<?php

namespace App\QueryBuilders;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class FeedbacksQueryBuilder extends QueryBuilder
{

    public Builder $model;

    public function __construct ()
    {
        $this->model = Feedback::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getFeedbacksWithPagination(int $quantity = 5): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }


    public function getOne(int $id) : Model
    {
        return $this->model->find($id);
    }
}
