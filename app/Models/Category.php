<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function get() : Collection
    {
        return \DB::table($this->table)->select(['id', 'title'])->get();

    }

}