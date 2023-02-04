@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
    </div>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    @if (session('status'))
        <x-alert type="success" message="{{ session('status') }}"></x-alert>
    @endif

    <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="category_ids">Категория</label>
            <select class="form-control" name="category_ids[]" id="category_ids" multiple>
                @foreach ($categories as $category)
                    <option @if(in_array($category->id, $news->categories->pluck('id')->toArray())) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option value="0">*** Выберете статус ***</option>
                @foreach ($statuses as $status)
                    <option @if ($news->status === $status) selected @endif>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="formInput">Заголовок</label>
            <input
                type="text"
                class="form-control"
                id="formInput"
                name="title"
                placeholder="..."
                value="{{ $news->title }}"
            >
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input
                type="text"
                class="form-control"
                id="author" name="author"
                placeholder="..."
                value="{{ $news->author }}"
            >
        </div>

        <div class="form-group">
            <label for="image">Загрузить изображение</label>
            <input
                type="file"
                class="form-control"
                id="image"
                name="image"
            >
        </div>

        <div class="form-group">
            <label for="description">Текст новости</label>
            <textarea
                class="form-control"
                id="description"
                name="description"
                placeholder="..."
            >{!! $news->description !!}</textarea>
        </div>
        <button type="submit" class="btn btn-success mb-2">Изменить</button>
    </form>
@endsection
