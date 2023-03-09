@extends('layouts.app')
@section('content')

    <div class="col-8 offset-2">

        @if(Auth::user()->avatar)
            <img style="width:150px;" src="{{ Auth::user()->avatar }}" alt="user_avatar">
        @endif

        <h2>Hello, {{ Auth::user()->name }}!</h2>
        <br>

        @if(Auth::user()->is_admin === true)
            <a href="{{ route('admin.index') }}">Админка</a>
        @endif
    </div>

@endsection
