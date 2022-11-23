@extends('layouts.layout1')

@section('title','Blastoiz | Menu')

@section('content')
    <!-- CARDS -->
    <div class="container-fluid">
        <div class="row justify-content-center mt-4">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="card border-primary cardMarginBottom">
                    <div class="card-body text-center">
                        <img src="/img/inpsectionIcon.svg" height="50" alt="Ícone inspeção">
                        <h3 class="card-title">Inspeções</h3>
                        <p class="text-muted" style="white-space:nowrap">Visualize todos as inspeções registradas.</p>
                        <a href="inspections" class="btn btn-outline-primary stretched-link"><img src="/img/chevron-up.svg" width="25" alt="link"></a>
                    </div>
                </div>
            </div>

            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="card border-primary cardMarginBottom">
                    <div class="card-body text-center">
                        <img src="/img/clientes.svg" height="50" alt="Ícone cliente">
                        <h3 class="card-title">Clientes</h3>
                        <p class="text-muted" style="white-space:nowrap">Visualize todos os clientes cadastrados.</p>
                        <a href="customers" class="btn btn-outline-primary stretched-link"><img src="/img/chevron-up.svg" width="25" alt="link"></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="secondRow" class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
            @if(session()->get('role') == 2)
                <div class="card border-primary cardMarginBottom">
                    <div class="card-body text-center">
                        <img src="/img/user.svg" height="50" alt="Ícone usuários do sistema">
                        <h3 class="card-title" style="white-space:nowrap">Usuários do sistema</h3>
                        <p class="text-muted" style="white-space:nowrap">Visualize todos os usuários.</p>
                        <a href="systemUsers" class="btn btn-outline-primary stretched-link"><img src="/img/chevron-up.svg" width="25" alt="link"></a>
                    </div>
                </div>
            @endif
            </div>

            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="card border-primary">
                    <div class="card-body text-center">
                        <img src="/img/pessoas.svg" height="50" alt="Ícone sobre nós">
                        <h3 class="card-title">Sobre nós</h3>
                        <p class="text-muted">Conheça o projeto.</p>
                        <a href="aboutUs" class="btn btn-outline-primary stretched-link"><img src="/img/chevron-up.svg" width="25" alt="link"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addMenuActiveClass(){
            var menu = document.getElementsByClassName("nav-link")
            menu[0].classList.add("active")
        }

        addMenuActiveClass()
    </script>
@endsection