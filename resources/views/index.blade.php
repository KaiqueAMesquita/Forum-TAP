@extends('layouts.navs')

@section('header', 'Bem Vindo ao ForumTech')

@section('content')
<head>
    <style>
        .topic{
            display: inline-block;
            border-radius: 5px;
            width: 400px;
            height: 280px;
            box-shadow: 0px 1px 1px 2px rgba(0, 0, 0, 0.329);
            margin-right: 20px;
            margin-top: 10px;
        }
        .topic:hover{
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.329);
        }
    </style>
</head>
<div class="cont">
    <div class="topic" id="one">
        <div class="topic-content">
            <h3>Title one</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
        </div>
    </div>
    <div class="topic" id="two">
        <div class="topic-content">
            <h3>Title two</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
        </div>
    </div>
    <div class="topic" id="three">
        <div class="topic-content">
            <h3>Title three</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
        </div>
    </div>
    <div class="topic" id="four">
        <div class="topic-content">
            <h3>Title four</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
        </div>
    </div>
</div>

@endsection
