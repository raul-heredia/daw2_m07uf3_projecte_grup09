@extends('disseny')
@section('content')

    <head>
        <meta charset="utf-8">
    </head>
    <?php
session_start();
if (!isset($_SESSION['administrador'])) {
    ?>
    <h2>Error, no tens accés a aquesta vista.</h2>
    <br><a href="{{ url('inici') }}\">Tornar A Inici</a>
    <?php    
}else{
?>
    <h1>Llista d'usuaris</h1>
    <div class="mt-5">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr class="table-dark">
                    <td>Nom</td>
                    <td>Cognoms</td>
                    <td>Email</td>
                    <td>Cap de Departament</td>
                    <td>Hora entrada</td>
                    <td>Hora sortida</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuari as $usr)
                    <tr>
                        <td>{{ $usr->nom }}</td>
                        <td>{{ $usr->cognoms }}</td>
                        <td>{{ $usr->email }}</td>
                        <td>
                            @if ($usr->isCapDepartament == 1)
                                <i class="bi bi-check-lg"></i>
                            @else
                                <i class="bi bi-x-lg"></i>
                            @endif
                        </td>
                        <td>{{ $usr->horaEntrada }}</td>
                        <td>{{ $usr->horaSortida }}</td>
                        <td class="text-left">
                            <a href="{{ route('usuaris.show', $usr->email) }}" class="btn btn-secondary btn-sm">PDF</a>
                            <a href="{{ route('usuaris.edit', $usr->email) }}" class="btn btn-success btn-sm">Edita</a>
                            <form action="{{ route('usuaris.destroy', $usr->email) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Esborra</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <br><a href="{{ url('usuaris/create') }}">Accés directe a la vista de creació d'usuaris</a>
            <?php
}
?>
        @endsection
