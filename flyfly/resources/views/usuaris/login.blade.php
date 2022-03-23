<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        nav {
            margin-bottom: 5px;
        }

        .navbar-brand {
            margin-left: 5px;
        }

        body.login {
            background: linear-gradient(90deg, #4b6cb7 0%, #182848 100%);
        }

        .login,
        .formldap {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
            font-family: 'Nunito', cursive;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            border-radius: 10px;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
        }

        .form input {
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            border-radius: 5px;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
            font-family: 'Nunito', cursive;
        }

        .form input:focus {
            background: #dbdbdb;
        }

        .form .button {
            font-family: 'Nunito', cursive;
            text-transform: uppercase;
            outline: 0;
            background: #4b6cb7;
            width: 100%;
            border: 0;
            border-radius: 5px;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }

        .form .button:active {
            background: #395591;
        }

        h5 {
            margin-bottom: 15px;
        }

        a.nav-link {
            color: white !important;
        }

        .hidden {
            display: none;
        }

        .inline {
            display: inline-block;
        }

        .flex-form {
            gap: 5px !important;
        }

    </style>
</head>

<body class="login">
    <div class="login">
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
            <div class="form">
                <form class="login-form" method="get" action="{{ route('autenticacio') }}" autocomplete="off">
                    @csrf
                    <h5>Accés Administració FlyFly</h5>
                    <input type="email" name="email" placeholder="Usuari" required />
                    <input type="password" name="password" placeholder="Contrasenya" required />
                    <input type="submit" class="button" value="Iniciar Sessió" />
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
