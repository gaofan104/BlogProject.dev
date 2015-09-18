@extends('app')


@section('content')
    <h1>Edit: {!! $article->title !!}</h1>

    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
        @include('articles.articlePartial', ['submitButtonText' => 'Update Article'])
    {!! Form::close() !!}

    {!! Form::open(['method' => 'GET', 'action' => 'ArticlesController@index']) !!}
    <div class="form-group">
        {!! Form::submit('View all articles', ['style'=> 'width:300px', 'class' => 'btn btn-primary form-control'] ) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::model($article, ['method' => 'GET', 'action' => ['ArticlesController@delete', $article->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete this articles', ['style'=> 'width:300px', 'class' => 'btn btn-primary form-control'] ) !!}
    </div>
    {!! Form::close() !!}

    {{--@if ($errors->any())--}}
        {{--<ul class="alert alert-danger">--}}
            {{--@foreach ($errors->all() as $error)--}}
                {{--<li>--}}
                    {{--{!! $error !!}--}}
                {{--</li>--}}

            {{--@endforeach--}}

        {{--</ul>--}}
    {{--@endif--}}
    @include('errors.list')
@stop