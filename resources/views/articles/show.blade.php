@extends('app')

@section('content')
    <h1>Title:</h1>
    {{ $article->title }}
    <article>
        <div class = "body">
            <h2>
                Body:
            </h2>

            {{ $article->body }}
        </div>
    </article>

    @unless ($article->tags->isEmpty())
        <h2>Tags:</h2>
        <ul>
            @foreach ($article->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless


    <h2>File Content:</h2>
    @if ($upload_type == 'img')
        <img src ={{ $upload }}>
    @else
        <text> {{ $upload }}</text>
    @endif

    <h2>
        Comments:
    </h2>

    @foreach ($comments as $comment)
        <article>
            {{ $comment->content }} {{ $comment->published_at }}
        </article>
    @endforeach


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