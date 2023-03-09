@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Все новости</h1>
        <p><a href="{{ route('admin.news.create') }}">Добавить новость</a></p>
    </div>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    @if (session('status'))
        <x-alert type="success" message="{{ session('status') }}"></x-alert>
    @endif


    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Категория</th>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th>Статус</th>
                    <th>Описание</th>
                    <th>Дата добавления</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($newsList as $news)
                    <tr>
                        <td>{{ $news->id }}</td>
                        <td>{{ $news->categories->map(fn($item) => $item->title)->implode(",") }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->author }}</td>
                        <td>{{ $news->status }}</td>
                        <td>{{ $news->description }}</td>
                        <td>{{ $news->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', ['news' => $news]) }}" style="color:blue">Изм.</a> &nbsp;
                            <a href="javascript:" class="delete" rel="{{ $news->id }}" style="color:red">Уд.</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Новостей нет</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $newsList->links() }}

    </div>
@endsection

@push('js')
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(item) {
                item.addEventListener("click", function() {
                    const id = this.getAttribute('rel');
                    if(confirm(`Вы действительно хотите удалить новость? (#ID = ${id})`)) {
                        send(`/admin/news/${id}`).then(() => {
                            location.reload();
                        });
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
