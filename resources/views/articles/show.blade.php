@extends('app')

@section('content')
    <h1>Title:</h1>
    {{ $article->title }}
    <h3>Author:</h3>
    {{ $article->author }}
    <h3>Published on:</h3>
    {{ $article->published_at }}

    <article>
        <div class = "body">
            <h3>Body:</h3>
            {{ $article->body }}
        </div>
    </article>

    @unless ($article->tags->isEmpty())
        <h3>Tags:</h3>
        <ul>
            @foreach ($article->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless


    <h3>File Content:</h3>
    @if ($upload_type == 'img')
        <img src ={{ $upload_content }}>
    @else
        <text> {{ $upload_content }}</text>
    @endif

    <h3>Add Comment:</h3>
    {!! Form::open(['method' => 'POST', 'action' => ['ArticlesController@addComment', $article->id]]) !!}
        @include('articles.commentPartial', ['submitButtonText' => 'Add Comment'])
    {!! Form::close() !!}
    @include('errors.list')

    <h3>
        Comments:
    </h3>

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