@extends('layouts.gpt')

@section('header', 'Listar Todos os Usuários')

@section('content')
@if($user != null)
    <h2 class="tittle">Perfil</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <tr>
            <td>{{$user -> name}}</td>
            <td>{{$user -> email}}</td>
        </tr>

    </table>
    @endif
@endsection
