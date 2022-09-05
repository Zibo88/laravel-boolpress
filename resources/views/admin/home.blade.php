@extends('layouts.dashboard')

@section('content')
    
    <h1>Benvenuto nell'area riservata</h1>
    <div>Nome: {{$user->name}}</div>
    <div>Email: {{$user->email}}</div>
@endsection