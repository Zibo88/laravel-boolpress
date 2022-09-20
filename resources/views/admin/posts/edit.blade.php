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
<form action="{{route ('admin.posts.update' , ['post' => $post->id])}}" method="post" enctype="multipart/form-data">

    @csrf
    {{-- dato che update riceve i dati con il metodo PUT inserirò: --}}
    @method('PUT')

    <label for="category_id">Categoria</label>
    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="category_id">
            <option selected>Seleziona La categoria</option> 
              {{-- ciclo foreach per leggere i dati provenienti dal controller --}}
            @foreach($categories as $category)
            {{-- {{dd($category->name)}} --}}
            {{-- se la categoria presente è uguale alla categoria dell’id del post stampa 'selected' altrimenti '' --}}
                 <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}> {{$category->name}} </option> 
            @endforeach
        </select>
    </div>    

    {{-- CHECKBOX --}}
    <div class="mb-3">
        {{-- stampo il nome dei tags nella check box --}}
        @foreach ($tags as $tag)
            @if ($errors->any())
                <div class="form-check">
                    {{-- associo for e id della input dando come valore l'id del tag, la value dovrà salvare sul db l'id del tag, il name è dato in base a che tipo di dato ci aspettiamo nel back end. In questo caso una lista di tag. aggiungiamo le [] per permettere all'utente di scegliere più caselle nella checkbox --}}
                    {{-- la if($errors->any()): se ci sono errori controlaa se nell'array old('tags') è presente il tag->id --}}
                    <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" name="tags[]" {{ in_array($tag->id, (old ('tags'))) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag-{{$tag->id}}">
                    {{$tag->name}}
                    </label>
                </div>
            @else
                <div class="form-check">
                    {{-- associo for e id della input dando come valore l'id del tag, la value dovrà salvare sul db l'id del tag, il name è dato in base a che tipo di dato ci aspettiamo nel back end. In questo caso una lista di tag. aggiungiamo le [] per permettere all'utente di scegliere più caselle nella checkbox --}}
                    <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}"name="tags[]" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{$tag->id}}">
                    {{$tag->name}}
                    </label>
                </div>
            @endif
           
        @endforeach
        
    </div>


    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        {{-- aggiunta di old alla value, se c'è il titolo stampalo altrimenti stampa il titolo che c'era prima --}}
        <input type="text" class="form-control" id="title" name="title" value="{{old ('title', $post->title )}}">
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Contenuto</label>
        <textarea class="form-control" id="content" rows="3" name="content">{{old ('content', $post->content )}}</textarea>
    </div>

     {{-- Input file --}}
     <div class="mb-3">
        <label for="image" class="form-label">Inserisci un'immagine</label>
        <input class="form-control" type="file" id="image" name="image">
        {{-- mostro la foto precedentemente caricata --}}
        <img src="{{asset('storage/' . $post->cover)}}" alt="{{ $post->title }}">
    </div>

    <input type="submit" value="Invia">
</form>
@endsection