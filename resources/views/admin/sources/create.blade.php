@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить источник новостей</h1>
    </div>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    @if (session('status'))
        <x-alert type="success" message="{{ session('status') }}"></x-alert>
    @endif

    <form method="post" action="{{ route('admin.sources.store') }}">
        @csrf

        <div class="form-group">
            <label for="url">Адрес</label>
            <input
                type="text"
                class="form-control"
                id="url"
                name="url"
                placeholder="..."
                value="{{ old('url') }}"
            >
        </div>

        <div class="form-group">
            <label for="title">Название</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                placeholder="..."
                value="{{ old('title') }}"
            >
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea
                class="form-control"
                id="description"
                name="description"
                placeholder="..."
            >{!! old('description') !!}</textarea>
        </div>
        <button type="submit" class="btn btn-success mb-2">Сохранить</button>
    </form>
@endsection
