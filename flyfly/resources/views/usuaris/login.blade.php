@extends('disseny')

@section('content')

    <h1>Iniciar Sessió</h1>
    <div class="card mt-5">

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
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" />
                </div>
                <div class="form-group">
                    <label for="password">Contrasenya</label>
                    <input type="password" class="form-control" name="password"
                        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-?]).{8,}$" />
                </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Iniciar Sessió</button>
        </form>
    </div>
    </div>
@endsection
