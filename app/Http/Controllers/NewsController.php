<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return View
     */

    public function index() : View
    {
        $newsRepo = new News();
        $catRepo = new Category();

        return \view('news.index', [
            'news' => $newsRepo->getNews(),
            'categories' => $catRepo->getCategories(),
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
        $newsRepo = new News();
        $catRepo = new Category();
        return \view('news.show', [
            'news' => $newsRepo->getNewsById($id),
            'categories' => $catRepo->getCategories(),
        ]);
    }
}



