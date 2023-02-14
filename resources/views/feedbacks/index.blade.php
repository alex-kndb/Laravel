@extends('layouts.main')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Комментарии</h1>
        <p><a href="{{ route('feedbacks.create') }}">Оставить комментарий</a></p>
    </div>

    @forelse($feedbacks as $feedback)
        <div class="card">
            <div class="card-header">
                {{ $feedback->title }}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{ $feedback->feedback }}</p>
                    <footer class="blockquote-footer">{{ $feedback->author }} <cite title="Source Title">{{ $feedback->created_at }}</cite></footer>
                </blockquote>
            </div>
        </div>
    @empty
        <p>Нет отзывов!</p>
    @endforelse

    {{ $feedbacks->links() }}

@endsection
