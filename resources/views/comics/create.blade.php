@extends('layouts.app')

@section('title', 'Nuovo fumetto')

@section('content')

    <div class="container">
        <form method="POST" action="{{ route('comics.store') }}">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo del fumetto:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">URL immagine del fumetto:</label>
                <input type="text" class="form-control" id="thumb" name="thumb">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo:</label>
                <input type="number" min="0" value="0" step="0.1" class="form-control" id="price"
                    name="price">
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Serie:</label>
                <input type="text" class="form-control" id="series" name="series">
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Data vendita:</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipologia:</label>
                <input type="text" class="form-control" id="type" name="type">
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>

@endsection
