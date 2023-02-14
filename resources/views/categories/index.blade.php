@extends('layouts.main')
@section('content')
    <nav class="nav d-flex justify-content-between">
        @foreach($categories as $category)
            <a class="p-2 text-muted" href="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->title }}</a>
        @endforeach
    </nav>
@endsection
