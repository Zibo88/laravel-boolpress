@extends('layouts.dashboard')

@section('content')
    <div class="row row-cols-3">
        @foreach ($posts as $post)
            {{-- controllo come sono nominate le chiavi --}}
            {{-- {{dd($post)}} --}}

            <div class="col">
                <div class="card mt-3">
                    <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                    {{-- collegamento attraverso id alla pagina show di quell'elemento, il parametro richiesto è [parametro] --}}
                    <a href="{{route ('admin.posts.show' , ['post' => $post->id])}}" class="card-link">Leggi di più</a>
                    {{-- <a href="#" class="card-link">Another link</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection