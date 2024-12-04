@extends('layouts.navs')

@section('header', '')

@section('content')
<style>
    .card-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        width: 100%;
    }
    .card {
        width: 80%;
        max-width: 600px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .card-header {
        background-color: #f8f9fa;
        font-size: 18px;
        font-weight: bold;
        padding: 10px;
        text-align: center;
    }
    .card-body {
        padding: 25px;
        text-align: center;
    }
    .card-footer {
        background-color: #f8f9fa;
        font-size: 14px;
        color: #6c757d;
        padding: 10px;
        text-align: center;
    }
    .btn {
        margin-top: 10px;
    }
    .img-topic{
        max-width: 100%;
        max-height: 400px;
    }
</style>

<div class="container">
   @if(Auth::check())
    <div class="btn-group" style="margin: 8px;" role="group" aria-label="Basic example">
    <a href="{{ route('EditTopic', $topic->id) }}" style="margin-right: 2px" class="btn btn-sm btn-primary">Editar</a>
    <form action="{{ route('DeleteTopic', $topic->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" style="margin-left: 2px" class="btn btn-sm btn-danger">Excluir</button>
    </form>
    </div>
    @endif
    <div class="card-container">
        <div class="card">
            <div class="card-header">
                {{ Str::limit($topic->category->title, 20) }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ Str::limit($topic->title) }}</h5>
                @if($topic->post->image != '')
                <img class="img-topic" src="/storage/{{ $topic->post->image }}">
                @endif
                <p class="card-text">{{ Str::limit($topic->description) }}</p>

            </div>
            <div class="card-footer">
                {{ $topic->created_at->diffForHumans() }}
            </div>
        </div>

    </div>
</br>
    <h3>Comentários</h3>
    <ul class="list-group" style="list-style: none">
         @foreach ($comments as $comment)
        <li href="#" class="list-group-item list-group-item-action" aria-current="true">
          <div class="d-flex w-100 justify-content-between">
            @if ($comment->postable && $comment->postable->image)
                <img class="mb-1" style="max-width:100%; max-height: 200px;" src="/storage/{{ $comment->postable->image }}" alt="">
            @endif
            <small>{{$comment->created_at->diffForHumans() }}</small>
          </div>
          <p class="mb-1">{{$comment->content}}</p>
          <small> <form action="{{ route('DeleteComment', $comment->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" style="margin-left: 2px" class="btn btn-secondary"><i class="fa-solid fa-trash"></i></button>
        </form><a class="btn btn-dark" href=""><i class="fa-solid fa-pen-to-square"></i></a></small>
        </li>
         @endforeach
         <li>
            <form method="POST" action="{{ route('CreateComment') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="commentable_id" value="{{ $topic->id }}">
                <input type="hidden" name="commentable_type" value="App\Models\Topic">
                <div class="form-group">
                    <label for="content" class="form-label">Escreva um Comentario</label>
                    <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autocomplete="content" autofocus>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <div class="form-group">
                        <label for="image" class="form-label">
                            <i class="fa-solid fa-paperclip" style="cursor: pointer; font-size: 24px;"></i>
                        </label>
                        <input id="image" type="file" class="form-control d-none @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>




                </div>
                <button type="submit" class="btn btn-primary">Criar</button>

            </form>

         </li>
    </ul>
@endsection
