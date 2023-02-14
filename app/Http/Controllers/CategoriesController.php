<?php

namespace App\Http\Controllers;

use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\View\View;

class CategoriesController extends Controller
{

    public function index(CategoriesQueryBuilder $categoriesQueryBuilder) : View
    {
        return \view('categories.index', [
            'categories' => $categoriesQueryBuilder->getAll()
        ]);
    }

    public function show(
//        string $category,
//        NewsQueryBuilder $newsQueryBuilder,
        CategoriesQueryBuilder $categoriesQueryBuilder
    ) : View
    {
        return \view('categories.show', [
            'category' => $categoriesQueryBuilder->getAll(),
//            'news' => $newsQueryBuilder->getNewsBycategory($category)
        ]);
    }
}
