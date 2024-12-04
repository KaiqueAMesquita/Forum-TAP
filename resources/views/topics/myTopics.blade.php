@extends('layouts.navs')

@section('header', 'Tópicos')

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
        padding: 15px;
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
</style>

<div class="container">
    <div class="card-container">
        @foreach($topics as $topic)
        <div class="card">
            <div class="card-header">
                {{ Str::limit($topic->category->title, 20) }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ Str::limit($topic->title, 12) }}</h5>
                <p class="card-text">{{ Str::limit($topic->description, 30) }}</p>
                <a href="{{ route('ListTopicById', $topic->id) }}" class="btn btn-primary">Ver mais</a>
                        </div>
            <div class="card-footer">
                {{ $topic->created_at->diffForHumans() }}
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
