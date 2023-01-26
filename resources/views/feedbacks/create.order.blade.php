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

        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
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

            <label for="inputPhone" class="col-sm-2 col-form-label col-form-label-lg">Phone</label>
            <div class="col-sm-10">
                <input
                    type="tel"
                    class="form-control form-control-lg"
                    id="inputPhone"
                    name="phone"
                    placeholder="Phone"
                    value="{{ old('phone') }}"
                >
                <br>
            </div>

            <label for="inputEmail" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
            <div class="col-sm-10">
                <input
                    type="email"
                    class="form-control form-control-lg"
                    id="inputEmail"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                >
                <br>
            </div>

            <label for="inputInfo" class="col-sm-2 col-form-label col-form-label-lg">Info</label>
            <div class="col-sm-10">
                <textarea name="info" id="inputInfo" placeholder="...">{{ old('info') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mb-2">Отправить</button>

        </div>
    </form>
@endsection
