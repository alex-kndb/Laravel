<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\View\View;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param NewsQueryBuilder $newsQueryBuilder
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */

    public function index(
        NewsQueryBuilder $newsQueryBuilder,
        CategoriesQueryBuilder $categoriesQueryBuilder
    ) : View
    {

        return \view('news.index', [
            'news' => $newsQueryBuilder->getNewsWithPagination(),
           'categories' => $categoriesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param NewsQueryBuilder $newsQueryBuilder
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */

    public function show(
        int $id,
        NewsQueryBuilder $newsQueryBuilder,
        CategoriesQueryBuilder $categoriesQueryBuilder
    ) : View
    {
        return \view('news.show', [
            'news' => $newsQueryBuilder->getOne($id),
            'categories' => $categoriesQueryBuilder->getAll(),
        ]);
    }
}



