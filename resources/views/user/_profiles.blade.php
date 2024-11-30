@extends('layouts.navs')

@section('header', 'Perfil')

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
            height: 250px;
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
            max-width: 160px;
            max-height: 200px;
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
            display: inline-block;
            margin: 5px 0;
        }

        .trash {
            background-color: red;
        }

        .edit {
            background-color: #61cff7;
        }

        .btn:hover {
            cursor: pointer;
        }

        .fa-pen-to-square, .fa-trash {
            color: white;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <div class="container">
        <div class="left-side">
            <img class="img-user" src="/storage/{{$user->photo}}">
        </div>
        <div>

        </div>
        <div class="right-side">
            <div class="info">
                <h4>Nome:</h4>
                <p>{{$user->name}}</p>

                <h4>Email:</h4>
                <p>{{$user->email}}</p>

                <p>Editar:</p>
                <a class="btn edit" href="{{ route('EditUser', $user->id) }}">
                    <i class="fa-solid fa-pen-to-square"></i>
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
