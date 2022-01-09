@extends('layouts.app')

@section('title', 'Просмотр')

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $posts->title }}</h2>
                    <p>{{ $posts->description }}</p>
                    <p><b>{{ $posts->choice['title'] }}</b></p>
                </div>
                <button class="btn btn-secondary button_text">
                    <a href="{{ route('post.index') }}">На главную</a>
                </button>

            </div>
        </div>
    </div>
@endsection
