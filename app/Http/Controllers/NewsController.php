<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class NewsController extends Controller
{
    use NewsTrait;
    use CategoriesTrait;

    public function index() : View
    {
        return \view('news.index', [
            'news' => $this->getNews(),
            'categories' => $this->getCategories()
        ]);
    }

    public function show(int $id) : View
    {
        return \view('news.show', [
            'news' => $this->getNewsById($id)
        ]);
    }
}



