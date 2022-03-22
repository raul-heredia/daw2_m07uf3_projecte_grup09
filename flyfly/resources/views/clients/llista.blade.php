@extends('disseny')

@section('content')
    <?php
    session_start();
    ?>

    <head>
        <meta charset="utf-8">
        <style>
            .container {
                max-width: 100% !important;
            }

        </style>
    </head>

    <h1>Llista De Clients</h1>
    <div class="mt-5">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr class="table-dark">
                    <td>Passaport</td>
                    <td>Nom</td>
                    <td>Cognoms</td>
                    <td>Edat</td>
                    <td>Telefon</td>
                    <td>Direccio</td>
                    <td>Ciutat</td>
                    <td>Pais</td>
                    <td>Email</td>
                    <td>Tipus de Tarjeta</td>
                    <td>Numero Tarjeta</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($client as $cli)
                    <tr>
                        <td>{{ $cli->passaportClient }}</td>
                        <td>{{ $cli->nom }}</td>
                        <td>{{ $cli->cognoms }}</td>
                        <?php
                        $dataNaix = new DateTime($cli->edat);
                        $avui = new DateTime(date('Y-m-d'));
                        $edat = $avui->diff($dataNaix);
                        ?>
                        <td>{{ $edat->y }}</td>
                        <td>{{ $cli->telefon }}</td>
                        <td>{{ $cli->direccio }}</td>
                        <td>{{ $cli->ciutat }}</td>
                        <td>{{ $cli->pais }}</td>
                        <td>{{ $cli->email }}</td>
                        <td>{{ $cli->tipusTarjeta }}</td>
                        <td>{{ $cli->numTarjeta }}</td>
                        <td class="text-left">
                            <a href="{{ route('clients.show', $cli->passaportClient) }}"
                                class="btn btn-secondary btn-sm">PDF</a>
                            <a href="{{ route('clients.edit', $cli->passaportClient) }}"
                                class="btn btn-success btn-sm">Edita</a>
                            <form action="{{ route('clients.destroy', $cli->passaportClient) }}" method="post"
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
            <br><a href="{{ url('clients/create') }}">Accés directe a la vista de creació de clients.</a>
            {{-- Bootstrap JS --}}
        @endsection
