@extends('layouts.layout1')

@section('title','Blastoiz | Sobre nós')

@section('content')
    <div class="container mt-4 shadow p-4 rounded-4">
        <div class="d-flex align-items-end text-start">
            <img src="/img/pessoas.svg" height="30" alt="Ícone Sobre nós">
            <h3 class="ms-2 mb-0">Sobre Nós</h3>
        </div>
        <div class="row">
            <hr>
            <div class="col-12 col-md-6 py-0 ps-0 pe-2">
                <img src="/img/fireInspection.jpg" alt="Imagem inspeção de incêndio" class="w-100" style="min-height:300px;">
            </div>
            <div class="col-12 col-md-6 p-0 mt-0">
                <p class="sobreNosTexto">Blastoize é um sistema de inspeção de equipamentos de combate a incêndio, 
                    desenvolvido como projeto de Trabalho de Conclusão de Curso, 
                    para adquirir a formação de Tecnólogo em Análise e Desenvolvimento de Sistemas no Fatec Rubens Lara.
                <p class="sobreNosTexto">O sistema foi desenvolvido utilizando a arquitetura MVC. A interface foi feita com HTML, CSS, JavaScript
                    e Bootstrap para auxiliar no design responsivo. O Backend foi desenvolvido utilizando PHP e Laravel.
                    Database: MySQL e Eloquent.
                </p>
                
            </div>
        </div>
        <div class="row">
            <div class="text-left mt-5 p-0">
                <h4>Desenvolvedores e suas respectivas funções no projeto:</h4>
            </div>
            <div class="row mt-4 p-0 justify-content-center">
               
                <div class="col-10 col-md-6">
                    <div class="card border-secondary cardMarginBottom">
                        <div class="card-body text-center">
                            <img src="/img/columns.svg" height="50" alt="Ícone inspeção">
                            <h3 class="card-title">Daniel Santana</h3>
                            <p class="text-muted" style="white-space:nowrap">UX/UI Designer</p>
                        </div>
                    </div>
                </div>

                <div class="col-10 col-md-6">
                    <div class="card border-secondary cardMarginBottom">
                        <div class="card-body text-center">
                            <img src="/img/documento.svg" height="50" alt="Ícone inspeção">
                            <h3 class="card-title">Ellen Vitória</h3>
                            <p class="text-muted" style="white-space:nowrap">Documentadora</p>
                        </div>
                    </div>
                </div>
                
            </div>
            <div id="secondRow" class="row p-0 justify-content-center">
                <div class="col-10 col-md-6">
                    <div class="card border-secondary cardMarginBottom">
                        <div class="card-body text-center">
                            <img src="/img/server.svg" height="50" alt="Ícone inspeção">
                            <h3 class="card-title">Henrique Gonçalves</h3>
                            <p class="text-muted">Desenvolvedor Backend</p>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-6">
                    <div class="card border-secondary">
                        <div class="card-body text-center">
                            <img src="/img/window-sidebar.svg" height="50" alt="Ícone inspeção">
                            <h3 class="card-title">Victor Arnoni</h3>
                            <p class="text-muted">Desenvolvedor Frontend</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection