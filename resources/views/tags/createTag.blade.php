@extends('layouts.navs')

@section('header', 'Criar Tag')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tópico</title>
    <style>
        .card-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .card {
            box-shadow: 0px 0px 5px rgba(98, 98, 98, 0.445);
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #445ce4;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn-submit:hover {
            cursor: pointer;
            background-color: #2f45c0;
        }

        .form-title {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 20px;
        }

        .invalid-feedback {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <div class="card">
            <h2 class="form-title">Criar</h2>
            <form method="POST" action="{{ route('CreateTag') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="tie" class="form-label">Título</label>
                    <input id="tie" type="text" class="form-control @error('tie') is-invalid @enderror" name="tie" value="{{ old('tie') }}" required autocomplete="tie" autofocus>
                    @error('tie')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                <button type="submit" class="btn-submit">Criar</button>
            </form>
        </div>
    </div>
</body>
</html>
@endsection
