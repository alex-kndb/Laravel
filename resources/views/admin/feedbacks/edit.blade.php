@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать отзыв</h1>
    </div>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    @if (session('status'))
        <x-alert type="success" message="{{ session('status') }}"></x-alert>
    @endif

    <form method="post" action="{{ route('admin.feedbacks.update', ['feedback' => $feedback]) }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="author">Автор</label>
            <input
                type="text"
                class="form-control"
                id="author"
                name="author"
                placeholder="..."
                value="{{ $feedback->author }}"
            >
        </div>

        <div class="form-group">
            <label for="title">Заголовок отзыва</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                placeholder="..."
                value="{{ $feedback->title }}"
            >
        </div>

        <div class="form-group">
            <label for="feedback">Текст отзыва</label>
            <textarea
                class="form-control"
                id="feedback"
                name="feedback"
                placeholder="..."
            >{!! $feedback->feedback !!}</textarea>
        </div>
        <button type="submit" class="btn btn-success mb-2">Изменить</button>
    </form>
@endsection
