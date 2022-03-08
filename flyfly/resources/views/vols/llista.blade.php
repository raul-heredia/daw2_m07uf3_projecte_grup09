@extends('disseny')

@section('content')

    <head>
        <meta charset="utf-8">

    </head>


    <h1>Llista d'usuaris</h1>
    <div class="mt-5">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr class="table-dark">
                    <td>Codi Vol</td>
                    <td>Codi Avió</td>
                    <td>Ciutat d'Origen</td>
                    <td>Ciutat de Destinació</td>
                    <td>Data Sortida</td>
                    <td>Data Arribada</td>
                    <td>Classe</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($vol as $flight)
                    <tr>
                        <td>{{ $flight->codiVol }}</td>
                        <td>{{ $flight->codiAvio }}</td>
                        <td>{{ $flight->ciutatOrigen }}</td>
                        <td>{{ $flight->ciutatDestinacio }}</td>
                        <td>{{ $flight->dataSortida }}</td>
                        <td>{{ $flight->dataArribada }}</td>
                        <td>{{ $flight->classe }}</td>
                        <td class="text-left">
                            <a href="{{ route('vols.edit', $flight->codiVol) }}" class="btn btn-success btn-sm">Edita</a>
                            <form action="{{ route('vols.destroy', $flight->codiVol) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Esborra</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <br><a href="{{ url('vols/create') }}">Accés directe a la vista de creació de Vols</a>
            {{-- Bootstrap JS --}}
        @endsection
