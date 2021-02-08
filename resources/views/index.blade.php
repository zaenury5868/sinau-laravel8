@extends('layout.app')
@section('title')
    Halaman data post
@stop
@section('body')
<h1>halaman post</h1>
    @if(count($data) > 0)
        <ul>
            @foreach ($data as $item)
                <a href="{{route('post.show', $item['id'])}}"><li>{{$item['title']}}</li></a>
            @endforeach
        </ul>
        @else
        <p>tidak ada data</p>
    @endif
@stop
