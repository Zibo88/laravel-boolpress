@extends('layouts.dashboard')

@section('content')

    <form action="{{route ('admin.posts.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
        </div>

        <input type="submit" value="Salva">
    </form>
@endsection