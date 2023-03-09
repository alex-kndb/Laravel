{{--@extends('layouts.main')--}}
{{--@section('categories')--}}
    <nav class="nav d-flex justify-content-between">
        @forelse($categories as $category)
            <a class="p-2 text-muted" href="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->title }}</a>
        @empty
            <p>Нет категорий!</p>
        @endforelse
    </nav>
{{--@endsection--}}
