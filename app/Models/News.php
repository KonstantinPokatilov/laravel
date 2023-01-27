<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews() : Collection
    {
        // return \DB::table($this->table)->get();
        return \DB::table($this->table)->select(['id', 'title', 'author', 'status', 'description', 'created_at'])->get();

    }

    public function getNewsById(int $id) : mixed
    {
        // return \DB::selectOne("SELECT id, title, author, description FROM {$this->table} WHERE id = :id",[
        //     'id' => $id,
        // ]);
        return \DB::table($this->table)->find($id);
    }

    public function getNewsByCategoryId(int $id) : mixed
    {
        return $a = \DB::table($this->table)
        ->leftJoin('category_has_news', 'news.id', '=', 'category_has_news.news_id')
        ->where('category_has_news.category_id', '=', $id)
        ->get();
    }
}
