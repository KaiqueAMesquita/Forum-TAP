@extends('layouts.navs')

@section('header', 'Lista de Tags')

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
        .btn{
            border: none;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }
        .trash{
            background-color: red;
        }
        .edit{
            background-color: #61cff7;
        }
        .view{
            background-color: #2d37cb;
        }
        .btn:hover{
            cursor: pointer;

        }
        .fa-pen-to-square,.fa-street-view,.fa-trash{
            color: white;
        }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <table border="1">
        <tr>
            <th>Laço</th>
            <th>Edição</th>
            <th>Visualição</th>
            <th>Deletar</th>
        </tr>
        @foreach($tags as $tag)
        <tr>
            <td>{{$tag -> tie}}</td>
            <td><a class="btn edit" href="{{route('EditTag',$tag->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><a class="btn view" href="{{route('ListTagById',$tag->id)}}"><i class="fa-solid fa-street-view"></i></a></td>
            <td>
            <form action="{{ route('DeleteTag', $tag->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn trash" type="submit"><i class="fa-solid fa-trash"></i></button>
            </form>
        </td>

        </tr>
        @endforeach
    </table>
    <a class="btn btn-primary" href="{{route('CreateTag')}}">Criar</a>

@endsection
