<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap CSS-->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!--Style.css-->
    <link href="/css/style.css" rel="stylesheet">
    
    <title>@yield('title')</title>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm p-0">
        <div class="container-fluid">
            <a href="/" class="navbar-brand p-0">
                <img src="/img/logoF.png" alt="Blastoize-logo" width="50" class="fluid-img">
                <img src="/img/magnet.png" alt="" width="80">
            </a>

            <!-- Dropdown do usuário logado -->
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/img/logedUser.svg" height="30" alt="Imagem de usuário">
                </button>
                <ul class="dropdown-menu text-center">
                    <li><span class="dropdown-item-text">Id: {{session()->get('user_id')}}</span></li>
                    <li><span class="dropdown-item-text">Função: {{session()->get('role')}}</span></li>
                    <li>
                        <form action="/logout" method="POST"> 
                            @csrf
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-primary">Logout</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
               
            <!--Toggle button-->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#top-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--Navbar links-->
            <div class="collapse navbar-collapse justify-content-end" id="top-nav">
                <ul class="navbar-nav">
                    <li class="nav-item text-center">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item text-center">
                        <a href="/customers" class="nav-link">Clientes</a>
                    </li>
                    <li class="nav-item text-center">
                        <a href="/inspections" class="nav-link">Inspeções</a>
                    </li>
                    @if(session()->get('role') == 2)
                        <li class="nav-item text-center">
                            <a href="/systemUsers" class="nav-link">Usuários</a>
                        </li>
                    @endif
                    <li class="nav-item text-center">
                        <a href="/aboutUs" class="nav-link">Sobre nós</a>
                    </li>
                </ul>
            </div>
        </div>
        
    </nav>
    
    @yield('content')

    <footer class="footer navbar-fixed-bottom mt-5 mb-3">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-10 col-lg-8 text-center">
                <hr>
                <div class="d-flex justify-content-center align-items-center">
                    <img src="/img/logoF.png" width="50" alt="logo BlastoiZ">
                    <h6 class="ms-1"> 2022 Blastoiz.</h6>
                </div>
            </div>
        </div>
    </footer>

    <!--Bootstrap JS-->
    <script src="/js/bootstrap.bundle.min.js"></script>

</body>


</html>