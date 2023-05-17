@extends('layouts.app')

@section('title', 'Comics')

@section('content')

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Data vendita</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Opzioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comics as $comic)
                    <tr>
                        <td scope="row">{{ $comic->id }}</td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>{{ $comic->sale_date }}</td>
                        <td>{{ $comic->price }}</td>
                        <td>
                            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary">Info</a>
                            <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}"
                                class="btn btn-secondary">Modifica</a>
                            {{-- <a href="{{ route('comics.destroy') }}" class="btn btn-danger">Elimina</a> --}}
                        </td>
                    </tr>
                @empty
                    <h3 class="text-center">
                        Nessun fumetto da poter mostrare, creane uno nuovoutilizzando il tasto qui sotto!
                    </h3>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('comics.create') }}" class="btn btn-primary">Aggiungi un nuovo fumetto</a>
    </div>

@endsection
