@extends('layouts.navs')

@section('header', 'Criar Tópico')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tópico</title>
    <style>
        .card-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .card {
            box-shadow: 0px 0px 5px rgba(98, 98, 98, 0.445);
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            background-color: #f9f9f9;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #445ce4;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn-submit:hover {
            cursor: pointer;
            background-color: #2f45c0;
        }

        .form-title {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 20px;
        }

        .invalid-feedback {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <div class="card">
            <h2 class="form-title">Criar</h2>
            <form method="POST" action="{{ route('CreateTopic') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Título</label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Descrição</label>
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category" class="form-label">Categoria</label>
                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category') }}" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tags" class="form-label">Tags</label>
                    <select class="form-select @error('tags') is-invalid @enderror" id="tags" name="tags[]" multiple required>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ old('tags') && in_array($tag->id, old('tags')) ? 'selected' : '' }}>
                                {{ $tag->tie }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>
                <div class="form-group">
                    <label for="image" class="form-label">Imagem</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">Criar</button>
            </form>
        </div>
    </div>
</body>
</html>
@endsection
