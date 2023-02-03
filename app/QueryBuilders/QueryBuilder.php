<?php declare(strict_types=1);

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Model\News;

abstract class QueryBuilder
{
    abstract function get() : Collection;
    abstract function getById(int $id) : mixed;
    // abstract function getNewsByCategoryId(int $id) : Collection;
    abstract function delete(int $id) : mixed;
}