@extends('layouts.dashboard')

@section('content')
    <form action=""{{route ('admin.posts.store')}} method="post">
        {{-- sicurezza del form --}}
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="tile" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        {{-- bottone per salvare --}}
        <input type="submit" value="Salva"> 
    </form>
    
@endsection