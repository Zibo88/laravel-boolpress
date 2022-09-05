@extends('layouts.dashboard')

@section('content')
{{-- stampo in pagina i dati provenienti da Postcontroller show() --}}
    <h1> {{ $post->title }} </h1>
    {{-- stampo i dati relativi alla creazione e modifica del post --}}
    <div> Creato il:{{$post->created_at}}</div>
    <div> Aggiornato il:{{$post->updated_at}}</div>
    <div>Slug: {{$post->slug}}</div>
    <p>{{$post->content}}</p>

@endsection