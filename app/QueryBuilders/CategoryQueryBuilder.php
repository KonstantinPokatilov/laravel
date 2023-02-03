<?php declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function get() : Collection
    {
        return $this->model->get();
    }

    public function getById(int $id) : mixed
    {
        return $this->model->find($id);
    }

    public function getCategoriesWithPagination(int $quantity = 10) : LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    public function delete(int $id) : mixed
    {
       return $this->model->where('id', '=', $id)->delete();
    }
}