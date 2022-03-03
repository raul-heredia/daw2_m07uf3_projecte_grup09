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
            <form method="post" action="{{ route('clients.update', $client->email) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="passaportClient">Passaport Client</label>
                    <input type="text" class="form-control" name="passaportClient"
                        value="{{ $client->passaportClient }}" />
                </div>
                <div class="form-group">
                    <label for="nom">Nom del Client</label>
                    <input type="text" class="form-control" name="nom" value="{{ $client->nom }}" />
                </div>
                <div class="form-group">
                    <label for="cognoms">Cognoms</label>
                    <input type="text" class="form-control" name="cognoms" value="{{ $client->cognoms }}" />
                </div>
                <div class="form-group">
                    <label for="edat">Data Naixement</label>
                    <input type="date" class="form-control" name="edat" value="{{ $client->edat }}" />
                </div>
                <div class="form-group">
                    <label for="telefon">Telèfon</label>
                    <input type="number" class="form-control" name="telefon" value="{{ $client->telefon }}" />
                </div>
                <div class="form-group">
                    <label for="direccio">Direcció</label>
                    <input type="text" class="form-control" name="direccio" value="{{ $client->direccio }}" />
                </div>
                <div class="form-group">
                    <label for="ciutat">Ciutat</label>
                    <input type="text" class="form-control" name="ciutat" value="{{ $client->ciutat }}" />
                </div>
                <div class="form-group">
                    <label for="pais">País</label>
                    <input type="text" class="form-control" name="pais" value="{{ $client->pais }}" />
                </div>
                <div class="form-group">
                    <label for="email">Correu Electrònic</label>
                    <input type="email" class="form-control" name="email" value="{{ $client->email }}" />
                </div>
                <div class="form-group">
                    <label for="tipusTarjeta">Tipus de Tarjeta</label>
                    <select class="form-select" name="tipusTarjeta" aria-label="Tipus de Tarjeta">
                        <option selected disabled>Selecciona una opció</option>
                        @if ($client->tipusTarjeta == 'Dèbit')
                            <option selected value="Dèbit">Dèbit</option>
                            <option value="Crèdit">Crèdit</option>
                        @else
                            <option value="Dèbit">Dèbit</option>
                            <option selected value="Crèdit">Crèdit</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="numTarjeta">Nº Tarjeta</label>
                    <input type="number" class="form-control" name="numTarjeta" value="{{ $client->numTarjeta }}" />
                </div>
        </div>
        <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
        </form>
        <a href="{{ url('usuaris') }}">Accés directe a la Llista d'usuaris</a>
    </div>
    </div>
@endsection
