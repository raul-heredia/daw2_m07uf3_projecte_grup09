@extends('disseny')

@section('content')

    <h1>Afegir un nou Empleat</h1>
    <div class="card mt-5">
        <div class="card-header">
            Formulari de creació d'Empleats
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
            <form method="post" action="{{ route('usuaris.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" />
                </div>
                <div class="form-group">
                    <label for="cognoms">Cognoms</label>
                    <input type="text" class="form-control" name="cognoms" />
                </div>
                <div class="form-group">
                    <label for="password">Contrasenya</label>
                    <input type="password" class="form-control" name="password"
                        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-?]).{8,}$" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" />
                </div>
                <div class="form-group">
                    <label for="isCapDepartament">Cap de departament</label>
                    <select class="form-select" name="isCapDepartament" aria-label="Es Cap Departament?">
                        <option selected disabled>Selecciona una opció</option>
                        <option value="1" name="1">Sí</option>
                        <option value="0" name="0">No</option>
                    </select>
                </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
        </form>
    </div>
    <br><a href="{{ url('usuaris') }}">Accés directe a la Llista d'usuaris</a>
    </div>
@endsection
