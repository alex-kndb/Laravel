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
            <label for="inputName" class="col-sm-2 col-form-label col-form-label-lg">Имя</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control form-control-lg"
                    id="inputName"
                    name="name"
                    placeholder="Name"
                    value="{{ old('name') }}"
                >
                <br>
            </div>

            <label for="inputInfo" class="col-sm-2 col-form-label col-form-label-lg">Комментарий</label>
            <div class="col-sm-10">
                <textarea name="comment" id="inputInfo" placeholder="...">{{ old('comment') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mb-2">Сохранить</button>

        </div>
    </form>
@endsection
