@extends('layouts.navs')

@section('header', 'Comentário')

@section('content')

<div class="container">
    <ul class="list-group" style="list-style: none">
            <li href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    @if ($comment->post && $comment->post->image)
                        <img  style="max-width:100%; max-height: 100px;" src="/storage/{{ $comment->post->image}}" alt="">
                    @endif
                    <small>{{$comment->created_at->diffForHumans() }}</small>
                </div>
                <p class="mb-1">{{$comment->content}}</p>
                <small>
                    <form action="{{ route('DeleteComment', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" style="margin-left: 2px;" class="btn btn-secondary"><i class="fa-solid fa-trash"></i></button>
                    </form>
                    <br>

                    <a class="btn btn-dark" href="{{route('EditComment', $comment->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-outline-secondary" href="{{route('ListTopicById', $comment->commentable_id)}}"><i class="fa-solid fa-list"></i></a>
                </small>
            </li>
    </ul>
</div>

@endsection
