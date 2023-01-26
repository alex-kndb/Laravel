<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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
    public function index() : View
    {
        return \view('feedbacks.index');
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        define('JSON_STORAGE', __DIR__.'/../../../storage/json/');

        // Для формы комментария
        $request->validate([
           'name' => 'required',
           'comment' => 'required | max:255'
        ]);

        // Для формы заказа выгрузки
//        $request->validate([
//            'name' => 'required',
//            'phone' => 'required',
//            'email' => 'required',
//            'info' => 'required | max:255',
//        ]);

        $data = $request->except('_token');

//        Laravel ругается, что нет прав на доступ к папке/файлу или их не существует.
//        Создал файл storage/json/json.txt.
//        Поменял права на папку с файлом на 777.
//        Знаю, что так плохо делать, но у меня и Laravel вообще не запускался,
//        пока не прописал права 777 на storage/logs.

        if(!file_put_contents(JSON_STORAGE.'json.txt', $data, FILE_APPEND)) {
            die('not ok');
        }

        return redirect('guest/feedbacks/create')
                ->withInput($request->except('comment'))
                ->with('status', 'New comment was added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
