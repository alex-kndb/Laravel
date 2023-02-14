@extends('layouts.feedbacks')
@section('content')
    <form method="post" action="{{ route('feedbacks.store') }}">

        <h1>Добавить комментарий</h1>

        @csrf
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        @if (session('status'))
                <x-alert type="success" message="{{ session('status') }}"></x-alert>
        @endif

        <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label col-form-label-lg">Имя</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control form-control-lg"
                    id="author"
                    name="author"
                    placeholder="Имя"
                    value="{{ old('author') }}"
                >
                <br>
            </div>

            <label for="title" class="col-sm-2 col-form-label col-form-label-lg">Тема</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control form-control-lg"
                    id="title"
                    name="title"
                    placeholder="Заголовок..."
                    value="{{ old('title') }}"
                >
                <br>
            </div>

                <label for="feedback" class="col-sm-2 col-form-label col-form-label-lg">Сообщение</label>
            <div class="col-sm-10">
                <textarea name="feedback" id="feedback" placeholder="...">{{ old('feedback') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mb-2">Сохранить</button>

        </div>
    </form>
@endsection
