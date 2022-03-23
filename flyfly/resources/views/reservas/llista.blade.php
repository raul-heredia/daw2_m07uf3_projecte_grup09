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


    <h1>Llista de Reserves</h1>
    <div class="mt-5">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr class="table-dark">
                    <td>Passaport Client</td>
                    <td>Codi Vol</td>
                    <td>Localitzador de Reserva</td>
                    <td>Nº de Seient</td>
                    <td>Equipatge de Mà</td>
                    <td>Equipatge de Cabina</td>
                    <td>Equipatges Facturats</td>
                    <td>Tipus d'Assegurança</td>
                    <td>Preu del Vol</td>
                    <td>Tipus Checking</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($reserva as $rsv)
                    <tr>
                        <td>{{ $rsv->passaportClient }}</td>
                        <td>{{ $rsv->codiVol }}</td>
                        <td>{{ $rsv->localitzadorReserva }}</td>
                        <td>{{ $rsv->numeroSeient }}</td>
                        <td>
                            @if ($rsv->isEquipatgeMa == 1)
                                <i class="bi bi-check-lg"></i>
                            @else
                                <i class="bi bi-x-lg"></i>
                            @endif
                        </td>
                        <td>
                            @if ($rsv->isEquipatgeCabinaMenor20 == 1)
                                <i class="bi bi-check-lg"></i>
                            @else
                                <i class="bi bi-x-lg"></i>
                            @endif
                        </td>
                        <td>{{ $rsv->quantitatEquipatgesFacturats }}</td>
                        <td>
                            @if ($rsv->tipusAsseguranca == 1000)
                                Franquicia fins a 1000€
                            @elseif($rsv->tipusAsseguranca == 500)
                                Franquicia fins a 500€
                            @elseif($rsv->tipusAsseguranca == 0)
                                Sense Franquicia
                            @endif
                        </td>
                        <td>{{ $rsv->preuVol }}€</td>
                        <td>{{ $rsv->tipusChecking }}</td>
                        <td class="text-left">
                            <?php $arr = [$rsv->passaportClient, $rsv->codiVol];
                            $claus = json_encode($arr);
                            ?>
                            <a href="{{ route('reservas.show', $claus) }}" class="btn btn-secondary btn-sm">PDF</a>
                            <a href="{{ route('reservas.edit', $claus) }}" class="btn btn-success btn-sm">Edita</a>
                            <form action="{{ route('reservas.destroy', $claus) }}" method="post"
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
            <br><a href="{{ url('reservas/create') }}">Accés directe a la vista de creació de Reserves</a>
            {{-- Bootstrap JS --}}
        @endsection
