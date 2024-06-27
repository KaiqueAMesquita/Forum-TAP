<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    * {
        padding: 0;
        margin: 0;
    }
    header {
        position: absolute;
        display: flex;
        width: 100%;
        height: 80px;
        background-color: #3b3939;
        align-items: center;
        justify-content: center;
    }
    input[type="search"] {
        width: 20%;f
        height: 25px;
        border: none;
        border-radius: 10px;
        padding: 5px;
    }
    .side-nav {
        position: fixed;
        display: inline-block;
        width: 10%;
        height: 100%;
        margin-right: 20px;
        background-color: #363535;
    }
    .nav-link {

        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        text-decoration: none;
        color: #38b6ff;
    }
    .nav-link:hover {
        background-color: #262626;
        color: #2c4bb1;
    }
    .content {
        margin-top: 100px;
        position: absolute;
        margin-left: 280px;
        padding: 20px;
        }
    .information {
        bottom: 0;
    }
    .logout {
        color: #38b6ff;
        text-decoration: none;
    }
    .fa-solid {
        color: #38b6ff;
        text-decoration: none;
    }
    .heads{
        font-family: Arial, Helvetica, sans-serif;
        margin-bottom: 10px;

    }
    .information{
        z-index: 30;
        margin-top: 280px;
        position: relative;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<header>
    <input type="search" name="" id="">
</header>

<nav class="side-nav">
    <ul>
        <li><a class="nav-link" href="{{route('Home')}}"><p>Home</p></a></li>
        <li><a class="nav-link" href="{{route('ListAllUsers')}}"><p>Usuários</p></a></li>
        <li><a class="nav-link" href="#"><p>Menu 3</p></a></li>
        <li><a class="nav-link" href="#"><p>Menu 4</p></a></li>
        <li class="information">
            @if(Auth::check())
            <a class="logout" href="{{route('ListUserById', Auth::user()->id)}}">
                <i class="fa-solid fa-user"></i> Perfil
            </a>
            <br>
            <br>
            <a class="logout" href="{{ route('Logout') }}">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Sair
            </a>
            @endif

            @if(Auth::guest())
            <a class="logout" href="{{ route('login') }}">
                <i class="fa-solid fa-user"></i> Entrar
            </a>
            @endif
        </li>
    </ul>


</nav>

<div class="content">
    <h2 class="heads">@yield('header')</h2>
    @yield('content')
</div>

</body>
</html>
