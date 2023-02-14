<?php

declare(strict_types=1);

namespace App\Providers;

use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\FeedbacksQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->app->bind(QueryBuilder::class,NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class,CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class,FeedbacksQueryBuilder::class);
        $this->app->bind(QueryBuilder::class,SourcesQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() : void
    {
        Paginator::useBootstrapFour();
    }
}
