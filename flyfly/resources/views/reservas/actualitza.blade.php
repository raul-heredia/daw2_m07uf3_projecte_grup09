@extends('disseny')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            Actualització de dades
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('reservas.update', $reserva->codiVol) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="passaportClient">Passaport Client</label>
                    <input type="text" class="form-control" name="passaportClient"
                        value="{{ $reserva->passaportClient }}" />
                </div>
                <div class="form-group">
                    <label for="codiVol">Codi Vol</label>
                    <input type="text" class="form-control" name="codiVol" value="{{ $reserva->codiVol }}"/>
                </div>
                <div class="form-group">
                    <label for="numeroSeient">Número de Seient</label>
                    <input type="number" class="form-control" name="numeroSeient" value="{{ $reserva->numeroSeient }}"/>
                </div>
                <div class="form-group">
                    <label for="isEquipatgeMa">Equipatge de Mà</label>
                    <select class="form-select" name="isEquipatgeMa" aria-label="Equipatge de Mà">
                        <option selected disabled>Selecciona una opció</option>
                        @if ($reserva->isEquipatgeMa == 1)
                            <option selected value="1">Sí</option>
                            <option value="0">No</option>
                        @else
                            <option value="1">Sí</option>
                            <option selected value="0">No</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="isEquipatgeCabinaMenor20">Equipatge de Cabina</label>
                    <select class="form-select" name="isEquipatgeCabinaMenor20" aria-label="isEquipatgeCabinaMenor20">
                        <option selected disabled>Selecciona una opció</option>
                        @if ($reserva->isEquipatgeCabinaMenor20 == 1)
                            <option selected value="1">Sí</option>
                            <option value="0">No</option>
                        @else
                            <option value="1">Sí</option>
                            <option selected value="0">No</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantitatEquipatgesFacturats">Quantitat Equipatges Facturats</label>
                    <input type="number" class="form-control" name="quantitatEquipatgesFacturats" value="{{ $reserva->quantitatEquipatgesFacturats }}"/>
                </div>
                <div class="form-group">
                    <label for="tipusAsseguranca">Tipus Assegurança</label>
                    <select class="form-select" name="tipusAsseguranca" aria-label="tipus Assegurança">
                        <option selected disabled>Selecciona una opció</option>
                        @if ($reserva->tipusAsseguranca == 1)
                            <option selected value="1000">Franquicia fins a 1000€</option>
                            <option value="500">Franquicia fins a 500</option>
                            <option value="0">Sense Franquicia</option>
                        @elseif ($reserva->tipusAsseguranca == 500)
                            <option value="1000">Franquicia fins a 1000€</option>
                            <option selected value="500">Franquicia fins a 500</option>
                            <option value="0">Sense Franquicia</option>
                        @elseif ($reserva->tipusAsseguranca == 0)
                            <option value="1000">Franquicia fins a 1000€</option>
                            <option value="500">Franquicia fins a 500</option>
                            <option selected value="0">Sense Franquicia</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="preuVol">Preu del Vol</label>
                    <input type="number" class="form-control" name="preuVol" value="{{ $reserva->preuVol }}"/>
                </div>
                <div class="form-group">
                    <label for="tipusChecking">Tipus de Checking</label>
                    <select class="form-select" name="tipusChecking" aria-label="Tipus de Checking">
                        <option selected disabled>Selecciona una opció</option>
                        @if ($reserva->tipusChecking == 'Online')
                            <option selected value="Online">Online</option>
                            <option value="Mostrador">Mostrador</option>
                            <option value="Quiosc">Quiosc</option>
                        @elseif ($reserva->tipusChecking == 'Mostrador')
                            <option value="Online">Online</option>
                            <option selected value="Mostrador">Mostrador</option>
                            <option value="Quiosc">Quiosc</option>
                        @elseif ($reserva->tipusChecking == 'Quiosc')
                            <option value="Online">Online</option>
                            <option value="Mostrador">Mostrador</option>
                            <option selected value="Quiosc">Quiosc</option>
                        @endif
                    </select>
                </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
        </form>
    </div>
    <br><a href="{{ url('vols') }}">Accés directe a la Llista de vols</a>
    </div>
@endsection
