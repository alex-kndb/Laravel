<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CreateRequest;
use App\Http\Requests\Admin\Categories\EditRequest;
use App\Models\Category;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.categories.index', [
            'categories' => $categoriesQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return \view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $category = new Category($request->validated());
        if ($category->save()) {
            return \redirect()->route('admin.categories.index')->with('status', 'Категория добавлена!');
        }
        return \back()->with('error', 'Не удалось добавит категорию!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category) : View
    {
        return \view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Category $category) : RedirectResponse
    {
        $category = $category->fill($request->validated());
        if ($category->save()) {
            return \redirect()->route('admin.categories.index')->with('success', 'Категория успешно обновлена');
        }
        return \back()->with('error', 'Не удалось изменить категорию');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        try{
            $category->delete();
            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error', 400);
        }
    }
}
