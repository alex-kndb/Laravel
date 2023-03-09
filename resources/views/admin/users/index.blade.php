@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Пользователи</h1>
        <p><a href="{{ route('admin.users.create') }}">Добавить пользователя</a></p>
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
                <th>Admin</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Пароль</th>
                <th>Дата добавления</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->is_admin === false ? 'Нет' : 'Да' }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user' => $user]) }}" style="color:blue">Изм.</a> &nbsp;
                        <a href="javascript:" class="delete" rel="{{ $user->id }}" style="color:red">Уд.</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Пользователей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{--{{ $users->links() }}--}}

    </div>

@endsection

@push('js')
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(item) {
                item.addEventListener("click", function() {
                    const id = this.getAttribute('rel');
                    if(confirm(`Вы действительно хотите удалить пользователя? (#ID = ${id})`)) {
                        send(`/admin/users/${id}`).then(() => {
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
