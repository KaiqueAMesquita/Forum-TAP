@extends('layouts.gpt')

@section('header', 'Listar Todos os Usuários')

@section('content')
<style>
    table{
        border-collapse: collapse;
        width: 30%;
        border: none;
        font-family: 'Courier New', Courier, monospace;
    }
    th,td{
        padding: 5px;
        border: none;

    }
    th{
        border: none;
        color: white;
        background-color: #6fa3cd;
    }
    th:first-child {
        border-top-left-radius: 5px;
        }
    th:last-child {
        border-top-right-radius: 5px;

        }
        tr:nth-child(odd) td {
            background-color: #fff;
        }
        tr:nth-child(even) td {
            background-color: #e2e1e1;
        }
        tr:last-child td:first-child{
            border-end-start-radius: 5px;

        }
        tr:last-child td:last-child{
            border-end-end-radius: 5px;

        }
</style>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Edição</th>
            <th>Visualição</th>
            <th>Deletar</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user -> name}}</td>
            <td>{{$user -> email}}</td>
            <td><a href="{{route('EditUser',$user->id)}}">editar</a></td>
            <td><a href="{{route('ListUserById',$user->id)}}">visualizar</a></td>
            <td >
            <form action="{{ route('DeleteUser', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Deletar Usuario</button>
            </form>
        </td>

        </tr>
        @endforeach
    </table>

@endsection
