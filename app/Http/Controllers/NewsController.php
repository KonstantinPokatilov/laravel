<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\News as NewsModel;
use App\Models\Category as CategoryModel;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\CommentsQueryBuilder;


class NewsController extends Controller
{
    public function index(NewsQueryBuilder $newsQueryBuilder, CategoryQueryBuilder $categoryQueryBuilder) : View
    {
        $newsList = $newsQueryBuilder->getNewsWithPagination();
        $categoryList = $categoryQueryBuilder->get();

        return \view('news.index', ['news' => $newsList, 'categories' => $categoryList ]);
    }

    public function show(int $id, NewsQueryBuilder $newsQueryBuilder, CommentsQueryBuilder $commentsQueryBuilder) : View
    {
        $news = $newsQueryBuilder->getById($id);
        $comments = $commentsQueryBuilder->getById($id);
        return \view('news.show', ['news' => $news, 'comments' => $comments]);
    }

    public function getNewsByCategories(int $id, 
        NewsQueryBuilder $newsQueryBuilder, 
        CategoryQueryBuilder $categoryQueryBuilder
    ) : View
    {
        $newsList = $newsQueryBuilder->getNewsWithCategories();
        $newList;
        foreach($newsList as $news) {
            $category_id = $news->categories->map(fn($item) => $item->id)->implode(",");
            if (!strstr($category_id, (String)$id)) {
                $newList = $newsList->forget($news->id - 1);
            }
        }
 
        $categoryList = $categoryQueryBuilder->get();

        return \view('news.index', ['news' => $newList, 'categories' => $categoryList]);
    }

    public function categoryDelete($id) : void
    {
        $queryBuilder = new CategoryQueryBuilder();
        if ($queryBuilder->delete((int)$id)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function newsDelete($id) : void
    {
        $queryBuilder = new NewsQueryBuilder();
        if ($queryBuilder->delete((int)$id)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
}
