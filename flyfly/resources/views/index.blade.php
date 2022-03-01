@extends('disseny')

@section('content')

<h1>Llista d'usuaris</h1>
<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td>Nom</td>
          <td>Cognoms</td>
          <td>Email</td>
          <td>Cap de Departament</td>
          <td>Hora entrada</td>
          <td>Hora sortida</td>
        </tr>
    </thead>
    <tbody>
        @foreach($usuari as $usr)
        <tr>
            <td>{{$usr->nom}}</td>
            <td>{{$usr->cognoms}}</td>
            <td>{{$usr->email}}</td>
            <td>{{$usr->isCapDepartament}}</td>
            <td>{{$usr->horaEntrada}}</td>
            <td>{{$usr->horaSortida}}</td>
            <td class="text-left">
                <a href="{{ route('usuaris.edit', $usr->email)}}" class="btn btn-success btn-sm">Edita</a>
                <form action="{{ route('usuaris.destroy', $usr->email)}}" method="post" style="display: inline-block">
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
@endsection