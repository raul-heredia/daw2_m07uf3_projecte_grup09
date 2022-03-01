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
        <form method="post" action="{{ route('usuaris.update', $empleat->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" value="{{ $empleat->nom }}" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $empleat->email }}" />
            </div>
            <div class="form-group">
                <label for="telefon">Telèfon</label>
                <input type="text" class="form-control" name="telefon" value="{{ $empleat->telefon }}" />
            </div>

            <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('usuaris') }}">Accés directe a la Llista d'usuaris</a
@endsection