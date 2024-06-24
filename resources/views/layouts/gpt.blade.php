<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    *{
        padding: 0;
        margin: 0;

    }
    header{
        display: flex;
        width: 100%;
        height: 80px;
        background-color: #3b3939;
        align-items: center;
        justify-content: center;


    }
    input[type="search"]{
        width: 20%;
        height: 25px;
        border: none;
        border-radius: 10px;
        padding: 5px


    }
    .side-nav{
        position: fixed;
        display: inline-block;
        width: 10%;
        height: 100%;
        margin-right: 20px;
        background-color: #363535;

    }
    .nav-link{
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        text-decoration: none;
        color: #38b6ff;
    }
    .nav-link:hover{
        background-color: #262626;
        color: #2c4bb1;
    }
    .content{
        margin-left: 10%;
        padding: 20px;
    }
    footer{
        color: white;
        display: flex;
        width: 100%;
        height: 50px;
        background-color: #3b3939;
        align-items: center;
        justify-content: center;
        position: fixed;
        bottom: 0;

    }
    .logout{
        position: absolute;
        right: 0;
        margin: 5px;
        text-decoration: none;
        color: aliceblue;
        background-color: #2c4bb1;
        padding: 5px;
        border-radius: 5px;
    }
    .logout:hover{
        background-color: #284378;
    }
</style>
</head>
<body>
<div>
    <header>
        <input type="search" name="" id="">
        <a class="logout" href="{{route('Logout')}}">LogOut</a>

    </header>

</div>
<nav class="side-nav">
    <ul>
        <li><a class="nav-link" href="#"><p>Menu 1</p></a></li>
        <li><a class="nav-link" href="#"><p>Menu 2</a></p></li>
        <li><a class="nav-link" href="#"><p>Menu 3</p></a></li>
        <li><a class="nav-link" href="#"><p>Menu 4</p></a></li>
    </ul>
</nav>

<div class="content">
    <h1>@yield('header')</h1>
    @yield('content')
</div>

<footer>
    <p>ForumTech - © 2024</p>
</footer>

</body>
</html>
