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
                        <a href="customers" class="nav-link">Clientes</a>
                    </li>
                    <li class="nav-item text-center">
                        <a href="inspections" class="nav-link">Inspeções</a>
                    </li>
                    <li class="nav-item text-center">
                        <a href="systemUsers" class="nav-link">Usuários</a>
                    </li>
                    <li class="nav-item text-center">
                        <a href="aboutUs" class="nav-link">Sobre nós</a>
                    </li>
                </ul>
            </div>
        </div>
        
    </nav>
    
    @yield('content')

    <!--Bootstrap JS-->
    <script src="/js/bootstrap.bundle.min.js"></script>

</body>
<footer class="footer navbar-fixed-bottom mt-5 mb-3">
    <div class="text-center">
        <h6>&copy; 2022 Blastoize.</h6>
    </div>
</footer>

</html>