@extends('layouts.navs')

@section('header', 'Tag')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Detalhes do Laço</h5>
            <hr>
            <div class="mb-3">
                <h6 class="fw-bold">Laço:</h6>
                <p class="text-muted">{{$tag->tie}}</p>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <!-- Botão de Editar -->
                <a class="btn btn-primary" href="{{ route('EditTag', $tag->id) }}">
                    <i class="fa-solid fa-pen-to-square me-2"></i>Editar
                </a>

                <!-- Formulário para Excluir -->
                <form action="{{ route('DeleteTag', $tag->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja excluir este laço?')">
                        <i class="fa-solid fa-trash me-2"></i>Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Importação do Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endsection
