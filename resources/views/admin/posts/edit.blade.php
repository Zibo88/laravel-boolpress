@extends('layouts.dashboard')

@section('content')
{{-- inserisco lo snip per mostrare gli errori a schermo --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{-- modifico la route in modo tale che trasferisca i dati raccolti dal form ad Update --}}
<form action="{{route ('admin.posts.update' , ['post' => $post->id])}}" method="post">

    @csrf
    {{-- dato che update riceve i dati con il metodo PUT inserirò: --}}
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        {{-- aggiunta di old alla value, se c'è il titolo stampalo altrimenti stampa il titolo che c'era prima --}}
        <input type="text" class="form-control" id="title" name="title" value="{{old ('title', $post->title )}}">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenuto</label>
        <textarea class="form-control" id="content" rows="3" name="content">{{old ('content', $post->content )}}</textarea>
    </div>

  <input type="submit" value="Modifica">
</form>
@endsection