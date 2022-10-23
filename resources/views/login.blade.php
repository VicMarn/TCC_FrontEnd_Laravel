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
                    
                    <img src="/img/login.svg" height="50" alt="Ícone de login">
                    <h3>Login</h3>
                    <input type="email" id="email" class="form-control mb-3 d-inline" style="width:70%" placeholder="E-mail" required autofocus>
                    <input type="password" id="password" class="form-control d-inline" style="width:70%" placeholder="Senha"> 
                    <input type="submit" class="form-control btn btn-outline-primary mt-3 d-inline" style="width:70%" value="Login">
                    <p class="text-muted">Esqueceu sua senha?<a href="#" class="text-decoration-none"> Clique aqui</a></p>
                    <hr class="mb-2 mt-0">
                    <p class="text-muted mt-2 mb-1">Novo usuário?</p>
                    <a href="signup" class="text-decoration-none">
                        <button class="btn btn-outline-secondary form-control d-inline" style="width:70%">Criar conta</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>