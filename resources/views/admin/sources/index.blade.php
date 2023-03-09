@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Источники</h1>
        <p><a href="{{ route('admin.sources.create') }}">Добавить источник</a></p>
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
                    <th>Адрес</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($sources as $source)
                    <tr>
                        <td>{{ $source->id }}</td>
                        <td>{{ $source->url }}</td>
                        <td>{{ $source->title }}</td>
                        <td>{{ $source->description }}</td>
                        <td>
                            <a href="{{ route('admin.sources.edit', ['source' => $source]) }}" style="color:blue">Изм.</a> &nbsp;
                            <a href="javascript:" class="delete" rel="{{ $source->id }}" style="color:red">Уд.</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Ресурсов нет</td>
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
                    if(confirm(`Вы действительно хотите удалить источник? (#ID = ${id})`)) {
                        send(`/admin/sources/${id}`).then(() => {
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
