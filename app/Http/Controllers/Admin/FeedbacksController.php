<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Feedbacks\EditRequest;
use App\Models\Feedback;
use App\QueryBuilders\FeedbacksQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param FeedbacksQueryBuilder $feedbacksQueryBuilder
     * @return View
     */
    public function index(FeedbacksQueryBuilder $feedbacksQueryBuilder) : View
    {
        return \view('admin.feedbacks.index', [
            'feedbacks' => $feedbacksQueryBuilder->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param Feedback $feedback
     * @return View
     */
    public function edit(Feedback $feedback) : View
    {
        return \view('admin.feedbacks.edit', [
            'feedback' => $feedback
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $editRequest
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function update(EditRequest $editRequest, Feedback $feedback) : RedirectResponse
    {
        $feedback = $feedback->fill($editRequest->validated());
        if ($feedback->save()) {
            return \redirect()->route('admin.feedbacks.index')
                ->with('success', __('messages.admin.feedback.edit.success'));
        }
        return \back()->with('error', __('messages.admin.feedback.edit.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feedback $feedback
     * @return JsonResponse
     */
    public function destroy(Feedback $feedback) : JsonResponse
    {
        try{
            $feedback->delete();
            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error', 400);
        }
    }
}
