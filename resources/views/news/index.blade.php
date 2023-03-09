@extends('layouts.main')
@section('content')

<div class="row mb-2">
@forelse ($news as $n)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">{{ $n->categories->map(fn($item) => $item->title)->implode(",") }}</strong>
                    <h3 style="overflow: hidden" class="mb-0">
                        <a class="text-dark" href="{{ route('news.show', ['id' => $n->id]) }}">{{ $n->title }}</a>
                    </h3>
                    <div class="mb-1 text-muted">{{ $n->created_at }}</div>
                    <p style="height: 75px; overflow-y: hidden" class="card-text mb-auto">{{ $n->description }}</p>
                    <a href="{{ route('news.show', ['id' => $n->id]) }}">Продолжить чтение...</a>
                </div>
                <img
                    style="width: 200px"
                    class="card-img-right flex-auto d-none d-lg-block"
                    @if(empty($n->image))
                        data-src="holder.js/200x247?theme=thumb"
                    @elseif(str_starts_with($n->image, 'http'))
                        src="{{ $n->image }}"
                    @else
                        src="{{ Storage::disk('public')->url($n->image) }}"
                    @endif

                    alt="Изображение для новости">

            </div>
        </div>
    @empty
    <p>We don't have any news, sorry!</p>
@endforelse
    {{ $news->links() }}
</div>
@endsection

