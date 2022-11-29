<!DOCTYPE html>
 <html lang="en">

 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Blastoiz | Login</title>
 </head>

 <body>
    
    <div class="d-flex align-items-center " style="height:100vh;background-color: #181920;">
        <div class="container">
            <div class="row justify-content-center"> 
                <div class="col-11 col-sm-9 col-md-7 col-lg-5 border rounded-4 p-4 text-center bg-light">
                    <div class="row">
                        @if(session('authErrorMsg'))
                        <p class="bg-danger text-center text-light">{{session('authErrorMsg')}}</p>
                        @endif
                    </div>
                    <form action="/login2" method="POST">
                        @csrf
                        <img src="/img/login.svg" height="50" alt="Ícone de login">
                        <h3>Login</h3>
                        <input name="email" type="email" class="form-control mb-3 d-inline" style="width:70%" placeholder="E-mail" required autofocus>
                        <input name="password" type="password" class="form-control d-inline" style="width:70%" placeholder="Senha" required> 
                        <input type="submit" class="form-control btn btn-outline-primary mt-3 d-inline" style="width:70%" value="Login">
                    </form>
                    <p class="text-muted">Esqueceu sua senha?<a href="#" class="text-decoration-none"> Clique aqui</a></p>
                    <hr class="mb-2 mt-0">
                    <p class="text-muted mt-2 mb-1">Novo usuário?</p>
                    <a data-bs-toggle="modal" data-bs-target="#chooseUserType" class="text-decoration-none">
                        <button class="btn btn-outline-secondary form-control d-inline" style="width:70%">Criar conta</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="chooseUserType" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Qual tipo de usuário será cadastrado?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <a href="/signup" class="btn btn-outline-primary">Pessoa Física</a>
                    </div>
                    <div class="mb-3 text-center">
                        <a href="/signupPJ" class="btn btn-outline-primary">Pessoa Jurídica</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>