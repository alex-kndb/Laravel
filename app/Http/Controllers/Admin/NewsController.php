<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\EditRequest;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function index(NewsQueryBuilder $newsQueryBuilder) : View
    {
        return \view(
            'admin.news.index', [
                'newsList' => $newsQueryBuilder->getNewsWithPagination()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder) : View
    {
        return \view('admin.news.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => NewsStatus::getAll()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request) : RedirectResponse
    {
        $news = News::create($request->validated());
        if ($news) {
            $news->categories()->attach($request->getCategoryIds());
            return \redirect()->route('admin.news.index')->with('status', 'Новость добавлена!');
        }

        return \back()->with('error', 'Не удалось добавить новость!');

//        $news = new News($request->validated());
//        if ($news->save()) {
//            $news->categories()->sync((array) $request->input('category_ids'));
//            return \redirect()->route('admin.news.index')->with('status', 'Новость добавлена!');
//        }
//        return \back()->with('error', 'Не удалось добавить новость!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(int $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder) : View
    {
        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => NewsStatus::getAll()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(EditRequest $request, News $news) : RedirectResponse
    {
        $news = $news->fill($request->validated());
        if ($news->save()) {
            $news->categories()->sync($request->getCategoryIds());
            return \redirect()->route('admin.news.index')->with('success', 'Новость успешно обновлена!');
        }
        return \back()->with('error', 'Не удалось сохранить запись!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return JsonResponse
     */
    public function destroy(News $news): JsonResponse
    {
        try{
            $news->delete();
            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error', 400);
        }
    }
}
