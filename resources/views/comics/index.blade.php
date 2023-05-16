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
                            {{-- <a href="{{ route('comics.show') }}" class="btn btn-primary">Info</a> --}}
                            {{-- <a href="{{ route('comics.update') }}" class="btn btn-secondary">Modifica</a> --}}
                            {{-- <a href="{{ route('comics.destroy') }}" class="btn btn-danger">Elimina</a> --}}
                        </td>
                    </tr>
                @empty
                @endforelse

            </tbody>
        </table>
    </div>

@endsection
