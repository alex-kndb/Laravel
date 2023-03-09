@extends('layouts.main')
@section('content')

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">

                <div class="blog-post">
                    <h2 class="blog-post-title">{{ $news->title }}</h2>
                    <p class="blog-post-meta">{{ $news->created_at }} by <a href="#">{{ $news->author }}</a></p>
                    <img
                        class="card-img-left flex-auto d-none d-lg-block"
                        @if(empty($n->image))
                            data-src="holder.js/200x247?theme=thumb"
                        @elseif(str_starts_with($n->image, 'http'))
                            src="{{ $n->image }}"
                        @else
                            src="{{ Storage::disk('public')->url($n->image) }}"
                        @endif
                        alt="Изображение для новости"
                    >

                    <p>{{ $news->description }}</p>

                </div><!-- /.blog-post -->

                <a class="btn btn-outline-primary" href="{{ back() }}">Назад</a>


            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main><!-- /.container -->

@endsection
