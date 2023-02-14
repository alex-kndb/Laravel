<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    use NewsTrait;
    use CategoriesTrait;

    public function index() : View
    {
        $catRepo = new Category();
        return \view('categories.index', [
            'categories' => $catRepo->getCategories()
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
