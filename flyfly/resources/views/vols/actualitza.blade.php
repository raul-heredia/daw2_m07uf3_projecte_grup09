@extends('disseny')

@section('content')
    <?php
    session_start();
    ?>
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
            <form method="post" action="{{ route('vols.update', $vol->codiVol) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="codiVol">Codi Vol</label>
                    <input type="text" class="form-control" name="codiVol" value="{{ $vol->codiVol }}" />
                </div>
                <div class="form-group">
                    <label for="codiAvio">Codi Avió</label>
                    <input type="text" class="form-control" name="codiAvio" value="{{ $vol->codiAvio }}" />
                </div>
                <div class="form-group">
                    <label for="ciutatOrigen">Ciutat d'origen</label>
                    <input type="text" class="form-control" name="ciutatOrigen" value="{{ $vol->ciutatOrigen }}" />
                </div>
                <div class="form-group">
                    <label for="ciutatDestinacio">Ciutat de destinació</label>
                    <input type="text" class="form-control" name="ciutatDestinacio"
                        value="{{ $vol->ciutatDestinacio }}" />
                </div>
                <div class="form-group">
                    <label for="terminalOrigen">Terminal d'origen</label>
                    <input type="text" class="form-control" name="terminalOrigen" value="{{ $vol->terminalOrigen }}" />
                </div>
                <div class="form-group">
                    <label for="terminalDestinacio">Terminal de destinació</label>
                    <input type="text" class="form-control" name="terminalDestinacio"
                        value="{{ $vol->terminalDestinacio }}" />
                </div>
                <div class="form-group">
                    <label for="dataSortida">Data sortida</label>
                    <input type="text" class="form-control" name="dataSortida" value="{{ $vol->dataSortida }}" />
                </div>
                <div class="form-group">
                    <label for="dataArribada">Data arribada</label>
                    <input type="text" class="form-control" name="dataArribada" value="{{ $vol->dataArribada }}" />
                </div>
                <div class="form-group">
                    <label for="classe">Classe</label>
                    <select class="form-select" name="classe" aria-label="A quina classe vitja">
                        <option selected disabled>Selecciona una opció</option>
                        @if ($vol->classe == 'Turista')
                            <option selected value="Turista">Turista</option>
                            <option value="Bussiness">Bussiness</option>
                            <option value="Primera">Primera</option>
                        @elseif ($vol->classe == 'Bussiness')
                            <option value="Turista">Turista</option>
                            <option selected value="Bussiness">Bussiness</option>
                            <option value="Primera">Primera</option>
                        @elseif ($vol->classe == 'Primera')
                            <option value="Turista">Turista</option>
                            <option value="Bussiness">Bussiness</option>
                            <option selected value="Primera">Primera</option>
                        @endif
                    </select>
                </div>
        </div>
        <button type="submit" class="btn btn-block btn-danger">Modificar</button>
        </form>
    </div>
    <br><a href="{{ url('vols') }}">Accés directe a la Llista de vols</a>
    </div>
@endsection
