@extends('disseny')

@section('content')

    <h1>Aplicació un nou Vol</h1>
    <div class="card mt-5">
        <div class="card-header">
            Formulari de creació de Vols
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
            <form method="post" action="{{ route('vols.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="codiVol">Codi Vol</label>
                    <input type="text" class="form-control" name="codiVol" />
                </div>
                <div class="form-group">
                    <label for="codiAvio">Codi Avió</label>
                    <input type="text" class="form-control" name="codiAvio" />
                </div>
                <div class="form-group">
                    <label for="ciutatOrigen">Ciutat d'origen</label>
                    <input type="text" class="form-control" name="ciutatOrigen" />
                </div>
                <div class="form-group">
                    <label for="ciutatDestinacio">Ciutat de destinació</label>
                    <input type="text" class="form-control" name="ciutatDestinacio" />
                </div>
                <div class="form-group">
                    <label for="terminalOrigen">Terminal d'origen</label>
                    <input type="text" class="form-control" name="terminalOrigen" />
                </div>
                <div class="form-group">
                    <label for="terminalDestinacio">Terminal de destinació</label>
                    <input type="text" class="form-control" name="terminalDestinacio" />
                </div>
                <div class="form-group">
                    <label for="dataSortida">Data sortida</label>
                    <input type="text" class="form-control" name="dataSortida" />
                </div>
                <div class="form-group">
                    <label for="dataArribada">Data arribada</label>
                    <input type="text" class="form-control" name="dataArribada" />
                </div>
                <div class="form-group">
                    <label for="classe">Classe</label>
                    <select class="form-select" name="classe" aria-label="A quina classe vitja">
                        <option selected disabled>Selecciona una opció</option>
                        <option value="1" name="1">Turista</option>
                        <option value="0" name="0">Bussiness</option>
                        <option value="2" name="2">Primera</option>
                    </select>
                </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
        </form>
    </div>
    <br><a href="{{ url('vols') }}">Accés directe a la Llista de vols</a>
    </div>
@endsection
