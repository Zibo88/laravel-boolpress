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
        {{-- creo la select in view create per dare la possibilità all'utente di modificarla --}}
        <label for="category_id">Categoria</label>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
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