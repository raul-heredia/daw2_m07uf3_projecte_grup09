@extends('disseny')

@section('content')
    <?php
session_start();
if (!isset($_SESSION['administrador'])) {
    ?>
    <h2>Error, no tens accés a aquesta vista.</h2>
    <br><a href="{{ url('inici') }}\">Tornar A Inici</a>
    <?php    
}else{
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
            <form method="post" action="{{ route('usuaris.update', $usuari->email) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" value="{{ $usuari->nom }}" />
                </div>
                <div class="form-group">
                    <label for="cognoms">Cognoms</label>
                    <input type="text" class="form-control" name="cognoms" value="{{ $usuari->cognoms }}" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $usuari->email }}" />
                </div>
                <div class="form-group">
                    <label for="isCapDepartament">Cap de departament</label>
                    <select class="form-select" name="isCapDepartament" aria-label="Es Cap Departament?">
                        <option selected disabled>Selecciona una opció</option>
                        @if ($usuari->isCapDepartament == 1)
                            <option selected value="1" name="1">Sí</option>
                            <option value="0" name="0">No</option>
                        @else
                            <option value="1" name="1">Sí</option>
                            <option selected value="0" name="0">No</option>
                        @endif
                    </select>
                </div>
                <br />
                <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
            </form>
        </div>
    </div>
    <br><a href="{{ url('usuaris') }}">Accés directe a la Llista d'usuaris</a>
    <?php
}
?>
@endsection
