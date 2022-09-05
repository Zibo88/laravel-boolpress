@extends('layouts.dashboard')

@section('content')
    <div class="row row-cols-3">
        @foreach ($posts as $post)
            <div class="col">
                <div class="card mt-3">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection