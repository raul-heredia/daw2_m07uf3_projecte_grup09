@extends('disseny')

@section('content')

<h1>Aplicació d'administració d'usuaris</h1>
<div class="card mt-5">
  <div class="card-header">
    Afegeix un nou empleat
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
              <input type="text" class="form-control" name="nom"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="cognoms">Cognoms</label>
              <input type="text" class="form-control" name="cognoms"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="password">Contrasenya</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="isCapDepartament">Cap Departament</label>
              <input type="text" class="form-control" name="isCapDepartament"/>
          </div>
          <div class="form-group">
              <label for="horaEntrada">horaEntrada</label>
              <input type="text" class="form-control" name="horaEntrada"/>
          </div>
          <div class="form-group">
              <label for="horaSortida">horaSortida</label>
              <input type="text" class="form-control" name="horaSortida "/>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Envia</button>
      </form>
  </div>
</div>
<br><a href="{{ url('usuaris') }}">Accés directe a la Llista d'usuaris</a>
@endsection