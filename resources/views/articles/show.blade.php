@extends('app')

@section('content')
    <h1>Title: {{ $article->title }}</h1>

    <article>
        <div class = "body">
            Body: </br>
            {{ $article->body }}
        </div>
    </article>

    {!! Form::open(['method' => 'GET', 'action' => ['ArticlesController@edit', $article->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Click here to edit this article', ['style'=> 'width:300px', 'class' => 'btn btn-primary form-control'] ) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method' => 'GET', 'action' => 'ArticlesController@index']) !!}
    <div class="form-group">
        {!! Form::submit('View all articles', ['style'=> 'width:300px', 'class' => 'btn btn-primary form-control'] ) !!}
    </div>
    {!! Form::close() !!}
@stop