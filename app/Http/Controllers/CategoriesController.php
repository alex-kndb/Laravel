<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CategoriesController extends Controller
{
    use NewsTrait;
    use CategoriesTrait;

    public function index() : View
    {
        return \view('categories.index', [
            'categories' => $this->getCategories()
        ]);
    }

    public function show($category) : View
    {
        return \view('categories.show', [
            'category' => $category,
            'news' => $this->getNewsByCategory($category)
        ]);
    }

}
