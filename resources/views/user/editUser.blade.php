@extends('layouts.navs')

@section('header', 'Editar Usuário')

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
                <form method="POST" action="{{ route('UpdateUser', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name" class="form-label">Nome</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Senha</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="form-label">Confirmar Senha</label>
                        <input id="password-confirm" class="form-control" type="password" name="password_confirmation" autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label for="photo" class="form-label">Foto</label>
                        <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" autocomplete="photo">
                        @error('photo')
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
