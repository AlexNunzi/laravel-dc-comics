@extends('layouts.app')

@section('title')
    Fumetto; {{ $comic->title }}
@endsection

@section('content')
    <div class="container">
        <div class="card w-50 m-auto">
            <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $comic->title }}</h5>
                <p class="card-text">{{ $comic->description }}</p>
                <ul class="list-unstyled">
                    <li>Prezzo: {{ $comic->price }}</li>
                    <li>Serie: {{ $comic->series }}</li>
                    <li>Data di vendita: {{ $comic->sale_date }}</li>
                    <li>Tipologia: {{ $comic->type }}</li>
                </ul>
                <a href="{{ route('comics.index') }}" class="btn btn-primary">Torna alla lista</a>
                <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-secondary">Modifica</a>
            </div>
        </div>
    </div>
@endsection
