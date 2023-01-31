<?php

namespace App\QueryBuilders;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Models\OrderNews;


class OrderNewsQueryBuilder extends QueryBuilder
{
    public Builder $model;
     
    public function __construct()
    {
        $this->model = OrderNews::query();
    }

    public function get() : Collection
    {
        return $this->model->get();
    }

    public function getById(int $id) : mixed
    {
        return $this->model->find($id);
    }
}





