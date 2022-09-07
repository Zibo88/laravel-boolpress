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
    <label for="category_id">Categoria</label>
    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="category_id">
            <option selected>Seleziona La categoria</option>
              {{-- ciclo foreach per leggere i dati provenienti dal controller --}}
            @foreach($categories as $category)
            {{-- se l’elemento selezionato ha lo stesso id di $category->id allora stampa ‘selectd’ altrimenti ‘’ --}}
                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}> {{$category->name}} </option>
            @endforeach
        </select>
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