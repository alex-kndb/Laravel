@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
    </div>

    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
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
    </div>
@endsection
