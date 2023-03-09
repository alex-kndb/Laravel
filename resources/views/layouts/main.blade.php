<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
</head>

<body>

<div class="container">

    <x-main.header></x-main.header>

    <div class="nav-scroller py-1 mb-2">
        @include('categories.index')
    </div>
</div>


<main role="main" class="container">
    @yield('content')
</main><!-- /.container -->


@php $year = now()->format('Y'); @endphp
<x-main.footer text="Новостной портал" :year="$year"></x-main.footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/holder.min.js') }}"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#FFFAFA',
        fg: '#FFA07A',
        text: 'News image'
    });
</script>
</body>
</html>

