<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
   .icon{
        display: none;
        }
    .menu-text{
        display: inline-block;
    }

    .offcanvas {
        max-width: 12%;
        
    }
      .offcanvas-header{
        padding: 13px;

    }
    .content {
        padding-left: 12%;
        margin:  20px;
    }
    .content{
      text-align: center;
      justify-content: center;
  }

    @media (max-width: 900px) {
        .icon{
            display: inline-block;
            margin-left: -20px
        }
        .menu-text{
        display: none;
    }
        .navbar-brand{
            display: none;
        }
        .offcanvas {
        width: 20%;
      }
      .offcanvas-body{
        
        width: 100%;
        overflow: hidden; 
        justify-content: flex-start;
      }
    .content {
          padding-left: 16%;
      }


    }

    </style>
  </head>
  <body>
    
    <nav class="navbar navbar-dark bg-dark border-bottom border-primary border-3">
        <div class="container-fluid">
          <a class="navbar-brand">
            Tech</a>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
          </form>
        </div>

      </nav>

    <div class="offcanvas offcanvas-start show bg-dark text-white" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header border-bottom border-primary border-3">
            <h5 class="offcanvas-title">Tech</h5>
        </div>
        <div class="offcanvas-body">
            <nav class="navbar navbar-dark bg-dark flex-column  p-2">
                <nav class="nav nav-pills flex-column text-start">
                  <a class="nav-link"  href="{{route('Home')}}"> <i class= "icon fas fa-home fa-lg"></i><span class="menu-text">Home</span></a>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon fa-solid fa-clipboard fa-lg"></i><span class="menu-text">Tópicos</span></a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                      <li><a class="dropdown-item"  href="{{route('ListAllTopics')}}">Ver todos</a></li>
                      <li><a class="dropdown-item" href="{{route('MyTopics')}}">Meus Tópicos</a></li>
                    </ul>
                    <a class="nav-link"  href="{{route('ListAllCategories')}}"> <i class=" icon fa-solid fa-list fa-lg"></i><span class="menu-text">Categorias</span></a>
                </nav>
              </nav>

        </div>
      </div>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Offcanvas with backdrop</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <p>.....</p>
        </div>
      </div>
      <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdroped with scrolling</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <p>Try scrolling the rest of the page to see this option in action.</p>
        </div>
      </div>
      <div class="content">
        <h2 class="heads">@yield('header')</h2>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>
