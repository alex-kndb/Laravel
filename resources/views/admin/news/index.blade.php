@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Все новости</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
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
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->author }}</td>
                        <td>{{ $news->status }}</td>
                        <td>{{ $news->description }}</td>
                        <td>{{ $news->created_at }}</td>
                        <td>
                            <a href="" style="color:blue">Изм.</a> &nbsp;
                            <a href="" style="color:red">Уд.</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Новостей нет</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
