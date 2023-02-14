<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Guest\Feedbacks\CreateRequest;
use App\Models\Feedback;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\FeedbacksQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return View
     */
    public function index(FeedbacksQueryBuilder $feedbacksQueryBuilder, CategoriesQueryBuilder $categoriesQueryBuilder) : View
    {
        return \view('feedbacks.index', [
            'feedbacks' => $feedbacksQueryBuilder->getFeedbacksWithPagination(),
            'categories' => $categoriesQueryBuilder->getAll()
        ]);
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
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return \view('feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request) : RedirectResponse
    {
        $feedback = new Feedback($request->validated());

        // Для формы заказа выгрузки
//        $request->validate([
//            'name' => 'required',
//            'phone' => 'required',
//            'email' => 'required',
//            'info' => 'required | max:255',
//        ]);

        if ($feedback->save()) {
            return \redirect()->route('feedbacks.index')->with('status', 'Отзыв добавлен!');
        }

        return \back()->with('error', 'Не удалось добавить отзыв!');

    }

}
