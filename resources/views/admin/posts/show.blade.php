@extends('layouts.dashboard')

@section('content')
{{-- stampo in pagina i dati provenienti da Postcontroller show() --}}
    <h1>{{$post->title}}</h1>
    <p>{{$post->content}}</p>
@endsection