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

    <form action="{{route ('admin.posts.store')}}" method="post">
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
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
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

        <input type="submit" value="Salva">
    </form>
@endsection