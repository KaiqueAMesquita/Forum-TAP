@extends('layouts.navs')

@section('header', 'Editar Usuário ')

@section('content')
<!DOCTYPE html>
    <html>
        <head>
            <style>
                .card {
                    box-shadow: 0px  0px  0px 1px rgba(98, 98, 98, 0.445);
                    border-radius: 10px;
                    padding: 10px;
                    width: 300px;
                    height: 350px;
                    display: flex;
                    justify-content: center;
                }

                .form-group {
                    margin-bottom: 20px;
                }

                input[type="text"],
                input[type="password"],
                input[type="email"]
                 {
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    width: 80%;
                }

                .invalid-feedback {
                    color: #red;
                }
                .submit{
                    width: 90%;
                    height: 30px;
                    background-color: #445ce4;
                    border: none;
                    border-radius: 5px;
                    color: white;
                }
                .submit:hover{
                    cursor: pointer;
                    background-color: #2f45c0;
                }
                .nameUser{
                    font-family: Arial, Helvetica, sans-serif;

                }
            </style>
        </head>

        @section('content')
            <div class="container">
                <h2 class="nameUser">{{$user->name}}</h2>
                <div class="card">

                        <form method="POST" action="{{ route('UpdateUser', $user->id) }}">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirmar Senha</label>
                                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
                            </div>

                                <button class="submit" type="submit" class="btn update">
                                    Atualizar
                                </button>

                        </form>

                </div>
            </div>
        @endsection



