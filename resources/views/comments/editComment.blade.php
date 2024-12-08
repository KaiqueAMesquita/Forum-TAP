@extends('layouts.navs')

@section('header', 'Editar Comentário')

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
                <form method="POST" action="{{ route('UpdateTopic', $comment->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label for="content" class="form-label">Escreva</label>
                    <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ $comment->content }}" required autocomplete="content" autofocus>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Imagem</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">
                    @error('image')
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
