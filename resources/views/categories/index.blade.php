<nav class="nav d-flex justify-content-between">
@foreach($categories as $category)
   <a class="p-2 text-muted" href="{{ route('categories.show', ['category' => $category['title']]) }}">{{ $category['title'] }}</a>
@endforeach
</nav>
