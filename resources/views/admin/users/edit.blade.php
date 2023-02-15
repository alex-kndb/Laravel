@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать пользователя</h1>
    </div>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    @if (session('status'))
        <x-alert type="success" message="{{ session('status') }}"></x-alert>
    @endif

    <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="is_admin">Тип пользователя</label>
            <select class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" id="is_admin">
                <option value="0">Стандартный</option>
                <option @if($user->is_admin === true) selected @endif value="{{ true }}">Админ</option>
            </select>
        </div>

        <div class="form-group">
            <label for="name">Имя</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                name="name"
                placeholder="..."
                value="{{ $user->name }}"
            >
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                placeholder="..."
                value="{{ $user->email }}"
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                name="password"
                placeholder="..."
                value="{{ $user->password }}"
            >
        </div>

        <button type="submit" class="btn btn-success mb-2">Изменить</button>
    </form>
@endsection
