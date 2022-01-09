@extends('layouts.app')

@section('title', 'News')


@section('content')

    {{--для выведения сообщения о действии--}}
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <a href="{{route('post.create')}}" class="btn btn-danger mb-5">Добавить новости</a>

    <table class="table table-striped  table-hover">
        <thead>
        <tr class="table-secondary">
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Выбор новостей</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td >{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->choice['title']}}</td>
                <td class="table_buttons">
                    <a href="{{route('post.show', $post->id)}}" class="btn btn-secondary">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{route('post.edit', $post->id)}}" class="btn btn-warning">
                        <i class="far fa-edit"></i>
                    </a>
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
