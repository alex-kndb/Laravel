<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sources\CreateRequest;
use App\Http\Requests\Admin\Sources\EditRequest;
use App\Models\Source;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SourcesQueryBuilder $sourcesQueryBuilder
     * @return View
     */
    public function index(SourcesQueryBuilder $sourcesQueryBuilder) : View
    {
        return \view('admin.sources.index', [
            'sources' => $sourcesQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return \view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request) : RedirectResponse
    {
        $source = Source::create($request->validated());
        if ($source) {
            return \redirect()->route('admin.sources.index')
                ->with('status', __('messages.admin.source.create.success'));
        }

        return \back()->with('error', __('messages.admin.source.create.fail'));
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
     * @param Source $source
     * @return View
     */
    public function edit(Source $source) : View
    {
        return \view('admin.sources.edit', [
            'source' => $source
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Source $source
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Source $source) : RedirectResponse
    {
        $source = $source->fill($request->validated());
        if ($source->save()) {
            return \redirect()->route('admin.sources.index')
                ->with('success', __('messages.admin.source.edit.success'));
        }
        return \back()->with('error', __('messages.admin.source.edit.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Source $source
     * @return JsonResponse
     */
    public function destroy(Source $source) : JsonResponse
    {
        try{
            $source->delete();
            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error', 400);
        }
    }
}
