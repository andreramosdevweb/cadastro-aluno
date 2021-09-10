<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório - Galileu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <style>

        *, body {
            font-family: 'Ubuntu', sans-serif;
        }

        .header {
            background: #5491c0;
            margin: 30px 0;
        }

        .logo {
            width: 100%;
            text-align: center;
            padding: 10px;
        }

        .info-report {
            text-align: center;
            width: 100%;
            padding: 10px;
            color: #fff3cd;
        }

        .info-report p {
            font-size: 1.5em;
            font-weight: bold;
        }

        table.greyGridTable {
            border: 2px solid #FFFFFF;
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }

        table.greyGridTable td, table.greyGridTable th {
            border: 1px solid #FFFFFF;
            padding: 3px 4px;
        }

        table.greyGridTable tbody td {
            font-size: 13px;
        }

        table.greyGridTable td:nth-child(even) {
            background: #EBEBEB;
        }

        table.greyGridTable thead {
            background: #FFFFFF;
            border-bottom: 4px solid #333333;
        }

        table.greyGridTable thead th {
            font-size: 15px;
            font-weight: bold;
            color: #333333;
            text-align: center;
            background: #a0aec0;
        }

        table.greyGridTable thead th:first-child {
            border-left: none;
        }

        table.greyGridTable tfoot td {
            font-size: 14px;
        }

    </style>
</head>
<body>

<div class="header">
    <div class="logo">
        <img src="{{asset('assets/images/logo-galileu.png')}}" alt="" width="150">
    </div>
    <div class="info-report">
        <p>Relatório de Alunos por Idade</p>
    </div>
</div>

<table class="greyGridTable">
    <thead>
    <tr>
        <th style="width: 30%">Nome Completo</th>
        <th style="width: 10%">Idade</th>
        <th style="width: 15%">R. Familiar</th>
        <th>Endereço</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $student)
        <tr>
            <td>{{$student->full_name}}</td>
            <td>{{$age}} anos</td>
            <td>R$ {{$student->family_income}}</td>
            <td>{{$student->street}} nº {{$student->number == null ? 'S/N' :$student->number }} {{$student->city}}
                /{{$student->state}}</td>
        </tr>
    @endforeach    </tbody>
</table>

</body>
</html>
