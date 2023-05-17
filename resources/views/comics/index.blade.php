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
                        <td class="d-flex">
                            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}"
                                class="btn btn-primary mx-1">Info</a>
                            <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}"
                                class="btn btn-secondary mx-1">Modifica</a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $comic->id }}">
                                Elimina
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal{{ $comic->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicuro di voler eliminare definitivamente il fumetto dalla tabella?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annulla</button>
                                            <form method="POST"
                                                action="{{ route('comics.destroy', ['comic' => $comic->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mx-1">Elimina</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h3 class="text-center">
                        Nessun fumetto da poter mostrare, creane uno nuovo utilizzando il tasto qui sotto!
                    </h3>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('comics.create') }}" class="btn btn-primary">Aggiungi un nuovo fumetto</a>
    </div>

@endsection
