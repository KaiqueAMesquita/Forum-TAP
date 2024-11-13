@extends('layouts.navs')

@section('header', 'Meus Tópicos')

@section('content')
<style>
    .card{
        margin: 10px;
        max-width: 100%;
    }
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }
    .card-wrapper {
        flex: 1 0 21%;
        min-width: 250px;
    }
</style>
<div class="container-sm">

@foreach($topics as $topic)
<div class="card text-center">
    <div class="card-header">
      {{$topic->category->title}}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$topic->title}}</h5>
      <p class="card-text">{{$topic->description}}</p>
      <a href="#" class="btn btn-primary">Ver mais</a>
    </div>
    <div class="card-footer text-muted">
        {{$topic->created_at->diffForHumans()}}
    </div>
  </div>
</div>
@endforeach

@endsection
