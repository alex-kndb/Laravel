<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

class NewsController extends Controller
{
    use NewsTrait;
    use CategoriesTrait;

    /**
     * Display a listing of the resource.
     *
     * @return View
     */

    public function index() : View
    {
        return \view('news.index', [
            'news' => $this->getNews(),
            'categories' => $this->getCategories()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */

    public function show(int $id) : View
    {
        return \view('news.show', [
            'news' => $this->getNewsById($id)
        ]);
    }
}



