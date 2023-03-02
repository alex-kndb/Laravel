<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Enums\NewsStatus;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct ()
    {
        $this->model = News::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getOne(int $id) : Model
    {
        return $this->model->find($id);
    }

    public function getNewsByStatus(string $status) : Collection
    {
        return $this->model->where('status', $status)->get();
    }

//    public function getNewsByCategory(string $category) : Collection
//    {
//        return $this->model->where('status', $status)->get();
//    }


    public function getNewsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }

}
