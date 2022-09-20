@extends('layouts.dashboard')

@section('content')
{{-- inserisco la visualizzazione degli errori a monitor --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                 @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Definisco verso quale rotta il form deve inviare i dati (store()) e con quale metodo --}}
    {{-- Attraverso enctype=“multipart/form-data” autorizzo i form ad inviare dati sotto forma di file --}}
    <form action="{{route ('admin.posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        {{-- select --}}
        {{-- creo la select in view create per dare la possibilità all'utente di modificarla, assegno all'id e al name il nome della colonna da cui prendere i dati --}}
        <label for="category_id">Categoria</label>
        <div class="mb-3">
             <select class="form-select" aria-label="Default select example" name="category_id">
                <option selected>Seleziona La categoria</option> 
                  {{-- ciclo foreach per leggere i dati provenienti dal controller --}}
                @foreach($categories as $category)
                {{-- {{dd($category->name)}} --}}
                {{-- se l’elemento selezionato ha lo stesso id di $category->id allora stampa ‘selectd’ altrimenti ‘’ --}}
                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}> {{$category->name}} </option> 
                @endforeach
        
            </select>
        </div>

        {{-- CHECKBOX --}}
        <div class="mb-3">
            {{-- stampo il nome dei tags nella check box --}}
            @foreach ($tags as $tag)
                <div class="form-check">
                    {{-- associo for e id della input dando come valore l'id del tag, la value dovrà salvare sul db l'id del tag, il name è dato in base a che tipo di dato ci aspettiamo nel back end. In questo caso una lista di tag. aggiungiamo le [] per permettere all'utente di scegliere più caselle nella checkbox --}}
                    {{-- l'aggiunta di old permette di valutare se all'interno dell'array old 'tags' sia presente l'id della selezione dell'utente, il secondo parametro dell'array ritorna un array vuoto  --}}
                    <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}"name="tags[]" {{ in_array($tag->id, old('tags', [])) ? 'checked' : ''}}
                    >
                    <label class="form-check-label" for="tag-{{$tag->id}}">
                    {{$tag->name}}
                    </label>
                </div>
            @endforeach
        </div>

        {{-- titolo --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            {{-- aggiunta di old alla value --}}
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
        </div>
        {{-- contenuto --}}
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" rows="3" name="content" value="">{{old('content')}}</textarea>
        </div>

        {{-- Input file --}}
        <div class="mb-3">
            <label for="image" class="form-label">Inserisci un'immagine</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>

        <input type="submit" value="Salva">
    </form>

@endsection