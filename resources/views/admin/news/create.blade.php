@extends('layouts.admin')
@section('content')
    <form method="post" action="{{ route('admin.news.store') }}">
        @csrf

        <h1>Добавить новость</h1>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
           @endforeach
        @endif

        <div class="form-group">
            <label for="formInput">Заголовок</label>
            <input
                type="text"
                class="form-control"
                id="formInput"
                name="title"
                placeholder="..."
                value="{{ old('title') }}"
            >
        </div>
        <div class="form-group">
            <label for="formInput2">Автор</label>
            <input
                type="text"
                class="form-control"
                id="formInput2" name="author"
                placeholder="..."
                value="{{ old('author') }}"
            >
        </div>
        <div class="form-group">
            <label for="formInput3">Текст новости</label>
            <textarea
                class="form-control"
                id="formInput3"
                name="text"
                placeholder="..."
            >{{ old('text') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mb-2">Сохранить</button>
    </form>
@endsection
