@extends('disseny')

@section('content')

    <h1>Afegir un nou Client</h1>
    <div class="card mt-5">
        <div class="card-header">
            Formulari de Clients
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
            <form method="post" action="{{ route('clients.store') }}">
                @csrf
                <div class="form-group">
                    <label for="passaportClient">Passaport Client</label>
                    <input type="text" class="form-control" name="passaportClient" />
                </div>
                <div class="form-group">
                    <label for="nom">Nom del Client</label>
                    <input type="text" class="form-control" name="nom" />
                </div>
                <div class="form-group">
                    <label for="cognoms">Cognoms</label>
                    <input type="text" class="form-control" name="cognoms" />
                </div>
                <div class="form-group">
                    <label for="edat">Data Naixement</label>
                    <input type="date" class="form-control" name="edat" />
                </div>
                <div class="form-group">
                    <label for="telefon">Telèfon</label>
                    <input type="number" class="form-control" name="telefon" />
                </div>
                <div class="form-group">
                    <label for="direccio">Direcció</label>
                    <input type="text" class="form-control" name="direccio" />
                </div>
                <div class="form-group">
                    <label for="ciutat">Ciutat</label>
                    <input type="text" class="form-control" name="ciutat" />
                </div>
                <div class="form-group">
                    <label for="pais">País</label>
                    <input type="text" class="form-control" name="pais" />
                </div>
                <div class="form-group">
                    <label for="email">Correu Electrònic</label>
                    <input type="email" class="form-control" name="email" />
                </div>
                <div class="form-group">
                    <label for="tipusTarjeta">Tipus de Tarjeta</label>
                    <select class="form-select" name="tipusTarjeta" aria-label="Tipus de Tarjeta">
                        <option selected disabled>Selecciona una opció</option>
                        <option value="Dèbit">Dèbit</option>
                        <option value="Crèdit">Crèdit</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="numTarjeta">Nº Tarjeta</label>
                    <input type="number" class="form-control" name="numTarjeta" />
                </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
        </form>
    </div>
    <br><a href="{{ url('clients') }}">Accés directe a la Llista de Clients</a>
    </div>
@endsection
