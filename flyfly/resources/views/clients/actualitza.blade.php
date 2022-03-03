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
            <form method="post" action="{{ route('usuaris.update', $client->email) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" value="{{ $client->nom }}" />
                </div>
                <div class="form-group">
                    <label for="cognoms">Cognoms</label>
                    <input type="text" class="form-control" name="cognoms" value="{{ $client->cognoms }}" />
                </div>
                <div class="form-group">
                    <label for="password">Contrasenya</label>
                    <input type="password" class="form-control" name="password" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $client->email }}" />
                </div>
                <div class="form-group">
                    <label for="isCapDepartament">Cap de departament</label>
                    <select class="form-select" name="isCapDepartament" aria-label="Es Cap Departament?">
                        <option selected disabled>Selecciona una opció</option>
                        <option value="1" name="1">Sí</option>
                        <option value="0" name="0">No</option>
                    </select>
                </div>
                <br />
                <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
            </form>
        </div>
    </div>
<br><a href="{{ url('usuaris') }}">Accés directe a la Llista d'usuaris</a @endsection
