<?php declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\CommentsQueryBuilder;
use App\QueryBuilders\OrderNewsQueryBuilder;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Pagination\Paginator;
use App\Services\Contracts\Parser;
use App\Services\ParserService;
use App\Services\Contracts\Social;
use App\Services\SocialService;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueryBuilder::class, CategoryQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, CommentsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, OrderNewsQueryBuilder::class);
        $this->app->bind(Parser::class, ParserService::class);
        //Services
        $this->app->bind(Social::class, SocialService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
    }
}
