@extends('layouts.dashboard')

@section('content')
{{-- stampo in pagina i dati provenienti da Postcontroller show() --}}
    <h1>Titolo: {{ $post->title }} </h1>
    {{-- stampo i dati relativi alla creazione e modifica del post --}}
    <div> Creato il: {{$post->created_at->format('d - F - Y')}}</div>
    <div> Aggiornato il: {{$post->updated_at->format('d - F - Y')}}</div>
    <div>Slug: {{$post->slug}}</div>
    <p>Contenuto: {{$post->content}}</p>

    {{-- creato link (camuffato da button) per la modifica del post da parte dell'admin --}}
    <a href="{{ route ('admin.posts.edit', ['post' => $post->id])}}"><input type="submit" value="Modifica il post"></a>

    {{-- creo un form per la cancellazione dei post --}}
    {{-- il form invia i dati a  destroy, con il parametro id, con metodo DELETE --}}
    <form action="{{route ('admin.posts.destroy', ['post' => $post->id])}}" method="post">
        @csrf
        @method('DELETE')
        <input class="btn btn-danger mt-3" type="submit" value="Cancella" onClick="return confirm ('Sicuro di voler cancellare il post?')" >
    </form>
@endsection