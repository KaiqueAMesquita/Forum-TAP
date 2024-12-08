@extends('layouts.navs')

@section('header', 'Editar Tag')

@section('content')
<!DOCTYPE html>
<html>
    <head>
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
        </style>
    </head>
    <body>
        <div class="card-container">
            <div class="card">
                <h2 class="form-title">Edição</h2>
                <form method="POST" action="{{ route('UpdateTag', $tag->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label for="tie" class="form-label">Tie</label>
                    <input id="tie" type="text" class="form-control @error('tie') is-invalid @enderror" name="tie" value="{{ $tag->tie }}" required autocomplete="tie" autofocus>
                    @error('tie')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                    <button type="submit" class="btn-submit">Atualizar</button>
                </form>
            </div>
        </div>
    </body>
</html>
@endsection
