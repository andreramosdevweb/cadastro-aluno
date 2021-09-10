<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Aluno</title>

    <link rel="stylesheet" href="{{ asset('assets/css/libs.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}"/>

</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg text-galileu-color bg-galileu-color">
        <div class="container">
            <a class="navbar-brand" href="{{route('students.index')}}"><img
                    src="{{asset('assets/images/logo-galileu.png')}}"
                    alt="GALILEU - CADASTRO DE ALUNO" height="40"></a>

        </div>
    </nav>
</header>

@yield('content')


<script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset("assets/js/libs.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/scripts.js")}}"></script>


</body>
</html>
