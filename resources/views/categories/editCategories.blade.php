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
                <h2 class="titleCategory">{{$category->title}}</h2>
                <div class="card">
                        <form method="POST" action="{{ route('UpdateCategory', $category->id) }}">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="name">Titulo</label>
                                <input id="title" type="text" class="@error('title') is-invalid @enderror" name="title" value="{{ $category->title }}" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <input id="description" type="text" class="@error('description') is-invalid @enderror" name="description" value="{{ $category->description }}" required autocomplete="description">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                                <button class="submit" type="submit" class="btn update">
                                    Atualizar
                                </button>

                        </form>

                </div>
            </div>
        @endsection



