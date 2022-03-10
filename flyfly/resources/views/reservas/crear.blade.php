@extends('disseny')

@section('content')

    <h1>Aplicació un nou Vol</h1>
    <div class="card mt-5">
        <div class="card-header">
            Formulari de creació de Reserves
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
            <form method="post" action="{{ route('reservas.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="passaportClient">Passaport Client</label>
                    <input type="text" class="form-control" name="passaportClient" />
                </div>
                <div class="form-group">
                    <label for="codiVol">Codi Vol</label>
                    <input type="text" class="form-control" name="codiVol" />
                </div>
                <div class="form-group">
                    <label for="numeroSeient">Número de Seient</label>
                    <input type="number" class="form-control" name="numeroSeient" />
                </div>
                <div class="form-group">
                    <label for="isEquipatgeMa">Equipatge de Mà</label>
                    <select class="form-select" name="isEquipatgeMa" aria-label="Equipatge de Mà">
                        <option selected disabled>Selecciona una opció</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="isEquipatgeCabinaMenor20">Equipatge de Cabina</label>
                    <select class="form-select" name="isEquipatgeCabinaMenor20" aria-label="isEquipatgeCabinaMenor20">
                        <option selected disabled>Selecciona una opció</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantitatEquipatgesFacturats">Quantitat Equipatges Facturats</label>
                    <input type="number" class="form-control" name="quantitatEquipatgesFacturats" />
                </div>
                <div class="form-group">
                    <label for="tipusAsseguranca">Tipus Assegurança</label>
                    <select class="form-select" name="tipusAsseguranca" aria-label="tipus Assegurança">
                        <option selected disabled>Selecciona una opció</option>
                        <option value="1000">Franquicia fins a 1000€</option>
                        <option value="500">Franquicia fins a 500</option>
                        <option value="0">Sense Franquicia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="preuVol">Preu del Vol</label>
                    <input type="number" class="form-control" name="preuVol" />
                </div>
                <div class="form-group">
                    <label for="tipusChecking">Tipus de Checking</label>
                    <select class="form-select" name="tipusChecking" aria-label="Tipus de Checking">
                        <option selected disabled>Selecciona una opció</option>
                        <option value="Online">Online</option>
                        <option value="Mostrador">Mostrador</option>
                        <option value="Quiosc">Quiosc</option>
                    </select>
                </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
        </form>
    </div>
    <br><a href="{{ url('reservas') }}">Accés directe a la Llista de reserves</a>
    </div>
@endsection
