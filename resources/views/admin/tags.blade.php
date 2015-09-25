@extends('app')

@section ('content')
    <h1> Tags </h1>
    {!! Form::open(['method' => 'POST', 'url' => 'createTag']) !!}
    <div class="form-group">
        {!!  Form::label('name', 'Tag Name:') !!}
        {!!  Form::input('title', 'name') !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Click here to create a tag', ['style'=> 'width:300px', 'class' => 'btn btn-primary form-control'] ) !!}
    </div>
    {!! Form::close() !!}



    {!! Form::open(['method' => 'GET', 'url' => 'homePage']) !!}
    <div class="form-group">
        {!! Form::submit('Return to home page', ['style'=> 'width:300px', 'class' => 'btn btn-primary form-control'] ) !!}
    </div>
    {!! Form::close() !!}

    @include('errors.list')

    @foreach ($tags as $tag)
        <article>
            <h2>
               {{-- <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>--}}
                {{--                <div class = "body">
                                    {{ $article->body }}
                                </div>--}}
                {{ $tag->name }}
            </h2>
        </article>
    @endforeach
@stop
