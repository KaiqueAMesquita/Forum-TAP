@extends('layouts.navs')

@section('header', 'Categoria')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Detalhes da Categoria</h5>
            <hr>
            <div class="mb-3">
                <h6 class="fw-bold">Título:</h6>
                <p class="text-muted">{{$category->title}}</p>
            </div>
            <div class="mb-3">
                <h6 class="fw-bold">Descrição:</h6>
                <p class="text-muted">{{$category->description}}</p>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a class="btn btn-primary" href="{{ route('EditCategory', $category->id) }}">
                    <i class="fa-solid fa-pen-to-square me-2"></i>Editar
                </a>

                <form action="{{ route('DeleteCategory', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
                        <i class="fa-solid fa-trash me-2"></i>Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endsection
