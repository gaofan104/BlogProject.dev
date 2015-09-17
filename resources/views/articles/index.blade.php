@extends('app')

@section('content')
    <h1> Articles </h1>
    {!! Form::open(['method' => 'GET', 'url' => 'articles/create']) !!}
     <div class="form-group">
        {!! Form::submit('Click here to create an article', ['style'=> 'width:300px', 'class' => 'btn btn-primary form-control'] ) !!}
     </div>
    {!! Form::close() !!}

    {!! Form::open(['method' => 'GET', 'url' => 'homePage']) !!}
    <div class="form-group">
        {!! Form::submit('Return to home page', ['style'=> 'width:300px', 'class' => 'btn btn-primary form-control'] ) !!}
    </div>
    {!! Form::close() !!}

    @include('errors.list')

    @foreach ($articles as $article)
        <article>
            <h2>
            <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
{{--                <div class = "body">
                    {{ $article->body }}
                </div>--}}
            </h2>
        </article>
    @endforeach
@stop