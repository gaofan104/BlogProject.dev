@extends('app')

@section('content')
    <h1>Write a New Article</h1>

    <hr/>

    {!! Form::open(['url' => 'articles', 'files' => true]) !!}
        @include('articles.articlePartial', ['submitButtonText' => 'Add Article'])
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
