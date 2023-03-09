@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Все категории</h1>
        <p><a href="{{ route('admin.categories.create') }}">Добавить категорию</a></p>

    </div>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    @if (session('status'))
        <x-alert type="success" message="{{ session('status') }}"></x-alert>
    @endif


    <nav class="nav d-flex justify-content-between">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                    <th>Дата добавления</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['category' => $category]) }}" style="color:blue">Изм.</a> &nbsp;
                            <a href="javascript:" class="delete" rel="{{ $category->id }}" style="color:red">Уд.</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Категорий нет</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </nav>
@endsection

@push('js')
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(item) {
                item.addEventListener("click", function() {
                    const id = this.getAttribute('rel');
                    if(confirm(`Вы действительно хотите удалить категорию? (#ID = ${id})`)) {
                        send(`/admin/categories/${id}`).then(() => {
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

