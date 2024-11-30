@extends('layouts.navs')

@section('header', 'Pefil')

@section('content')
<!DOCTYPE html>
    <html>
        <head>
            <style>
                .img-user{
                    width: 150px;
                    height: 150px;
                    border-radius: 50%;
                    -webkit-box-shadow: -1px -2px 19px 0px rgba(0,0,0,0.75);
                    -moz-box-shadow: -1px -2px 19px 0px rgba(0,0,0,0.75);
                    box-shadow: -1px -2px 19px 0px rgba(0,0,0,0.75);
                    margin: 10px
                }

                .btn{
                    margin: 5px;
                }
                .container{
                    margin-top: 30px;
                }
                .profile{
                    padding: 10px;
                    border-radius: 5px;
                    -webkit-box-shadow: -1px 0px 4px 3px rgba(158,158,158,1);
-moz-box-shadow: -1px 0px 4px 3px rgba(158,158,158,1);
box-shadow: -1px 0px 4px 3px rgba(158,158,158,1);
                    height: 500px;
                }
            </style>
        </head>

        @section('content')
        <div class="container">
            <div class="row">
              <div class="col-4">

              </div>
              <div class="col-4 profile">
                <img class="img-user" src="/storage/{{$user->photo}}">
                <p> Nome: {{$user->name}}</p>

                <p>Email: {{$user->email}}</p>
                <div class="info">
                    <a class="btn btn-info" href="{{ route('EditUser', $user->id) }}">
                        Editar: <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action="{{ route('DeleteUser', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                           Excluir: <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-4">

            </div>
          </div>

@endsection
