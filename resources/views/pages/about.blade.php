@extends('app')

@section('content')

    @if (true)
        <h1>Hello if statement returns true</h1>
    @endif

    <h1>About Me {!! $first !!}  {!! $last !!}</h1>

    @if (count($people))
        <h3>People I like:</h3>
        <ul>
            @foreach ($people as $person)
                <li> {!! $person !!}</li>
            @endforeach
        </ul>
    @endif
@stop