<?php declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class NewsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    public function get() : Collection
    {
        return $this->model->get();
    }

    public function getById(int $id) : mixed
    {
        return $this->model->find($id);
    }

    public function getNewsByCategoryId(int $id) : Collection
    {
       
    }

    public function getNewsWithPagination(int $quantity = 10) : LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }

    public function getNewsWithCategories() : Collection
    {
        return $this->model->with('categories')->get();
    }

    public function delete(int $id) : mixed
    {
       return $this->model->where('id', '=', $id)->delete();
    }

}