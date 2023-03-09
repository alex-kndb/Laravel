@extends('layouts.feedbacks')
@section('content')
    <form method="post" action="{{ route('feedbacks.store') }}">

        <h1>Заполните заявку на выгрузку</h1>

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
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                    placeholder="Name"
                    value="{{ old('name') }}"
                >
                <br>
            </div>

            <label for="phone" class="col-sm-2 col-form-label col-form-label-lg">Phone</label>
            <div class="col-sm-10">
                <input
                    type="tel"
                    class="form-control form-control-lg @error('phone') is-invalid @enderror"
                    id="phone"
                    name="phone"
                    placeholder="Phone"
                    value="{{ old('phone') }}"
                >
                <br>
            </div>

            <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
            <div class="col-sm-10">
                <input
                    type="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                >
                <br>
            </div>

            <label for="info" class="col-sm-2 col-form-label col-form-label-lg">Info</label>
            <div class="col-sm-10">
                <textarea
                    class="@error('info') is-invalid @enderror"
                    name="info"
                    id="info"
                    placeholder="...">{{ old('info') }}
                </textarea>
            </div>

            <button type="submit" class="btn btn-success mb-2">Отправить</button>

        </div>
    </form>
@endsection
