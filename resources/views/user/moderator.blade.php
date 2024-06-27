@extends('layouts.navs')

@section('header', 'Perfil (Modo Moderador)')

@section('content')
<head>
    <style>
        *{
            left: 0;
            right: 0;
        }

        .container {
            font-family: Arial, Helvetica, sans-serif;
            width: 450px;
            height: 350px;
            box-shadow: 1px 1px 1px 2px rgba(100, 100, 100, 0.468);
            border-radius: 5px;
            padding: 20px;
            margin: auto;
        }

        .left-side, .right-side {
            display: inline-block;
            vertical-align: top;
            width: 45%;
            padding: 10px;
        }

        .img-user {
            width: 160px;
            height: 200px;
            background-color: #999;
            margin: auto;
        }

        .info h4 {
            margin: 5px 0;
        }

        .btn {
            border: none;
            padding: 10px;
            border-radius: 5px;
            color: white;
            display:inline-block;
            margin: 5px 0;
        }

        .trash {
            background-color: red;
        }

        .edit {
            background-color: #61cff7;
        }
        .suspend{
            background-color: #cf8845;
        }
        .ban{
            background-color: #771515;
        }

        .btn:hover {
            cursor: pointer;
        }

        .fa-pen-to-square, .fa-trash,.fa-ban,.fa-clock {
            color: white;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <div class="container">
        <div class="left-side">
            <div class="img-user"></div>
        </div>
        <div class="right-side">
            <div class="info">
                <h4>Nome:</h4>
                <p>{{$user->name}}</p>

                <h4>Email:</h4>
                <p>{{$user->email}}</p>

                <p>Editar:</p>
                <a class="btn edit">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <p>Suspender:</p>
                <a class="btn suspend">
                    <i class="fa-solid fa-clock"></i>
                 </a>
                <p>Banir:</p>
                <a class="btn ban">
                    <i class="fa-solid fa-ban"></i>
                </a>

                <p>Excluir:</p>
                <form action="{{ route('DeleteUser', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn trash" type="submit">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection
