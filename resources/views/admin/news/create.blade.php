@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
    </div>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    @if (session('status'))
        <x-alert type="success" message="{{ session('status') }}"></x-alert>
    @endif

        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf

            <div class="form-group">
                <label for="category_ids">Категория</label>
                <select class="form-control @error('category_ids[]') is-invalid @enderror" name="category_ids[]" id="category_ids" multiple>
                    <option value="0">*** Выберете категорию ***</option>
                    @foreach ($categories as $category)
                        <option @if((int) old('category_id') === $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option value="0">*** Выберете статус ***</option>
                    @foreach ($statuses as $status)
                        <option @if (old('status') === $status) selected @endif>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Заголовок</label>
                <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    name="title"
                    placeholder="..."
                    value="{{ old('title') }}"
                >
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input
                    type="text"
                    class="form-control @error('author') is-invalid @enderror"
                    id="author"
                    name="author"
                    placeholder="..."
                    value="{{ old('author') }}"
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
                    class="form-control @error('description') is-invalid @enderror"
                    id="description"
                    name="description"
                    placeholder="..."
                >{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success mb-2">Сохранить</button>
        </form>
@endsection
