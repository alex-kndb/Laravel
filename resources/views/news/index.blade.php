@extends('layouts.main')
@section('content')

<div class="row mb-2">
@forelse ($news as $n)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
{{--                    <strong class="d-inline-block mb-2 text-primary">{{ $n['category'] }}</strong>--}}
                    <h3 class="mb-0">
                        <a class="text-dark" href="{{ route('news.show', ['id' => $n->id]) }}">{{ $n->title }}</a>
                    </h3>
                    <div class="mb-1 text-muted">{{ $n->created_at }}</div>
                    <p style="height: 75px; overflow-y: hidden" class="card-text mb-auto">{{ $n->description }}</p>
                    <a href="{{ route('news.show', ['id' => $n->id]) }}">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
            </div>
        </div>
    @empty
    <p>We don't have any news, sorry!</p>
@endforelse
</div>
@endsection

