@extends('layouts.app')

@section('title', 'Peдактировать')

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">

            {{-- для вывода ошибок--}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif

            <form method="POST" action="{{ route('post.update', $posts->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="post_title" class="form-label">Название</label>
                    <input type="text" name="title" value="{{ $posts->title }}" class="form-control" id="post_title">
                </div>
                <div class="mb-3">
                    <label for="post_description" class="form-label">Описание</label>
                    <textarea name="description" class="form-control"
                              id="post_description">{{ $posts->description }}</textarea>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <select class="form-select" id="choice_id" name="choice_id" aria-label="Default select example">
                            <option selected>Выбор новостей</option>
                            @foreach($choices as $choice)
                                <option value="{{ $choice->id }}"
                                        @if ($choice->id === $posts->choice_id)
                                        selected
                                    @endif
                                >{{ $choice->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Отредактировать</button>
            </form>
        </div>
    </div>



@endsection

