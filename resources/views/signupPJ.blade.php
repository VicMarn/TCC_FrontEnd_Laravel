<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blastoiz | Cadastro</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
 </head>
 <body style="background-color: #181920;">
    <div class="d-flex align-items-center " style="height:100vh;">
        <div class="container">
            <div class="row justify-content-center"> 
                <div class="col-11 col-sm-11 col-md-9 col-lg-7 border rounded-4 p-4 text-center bg-light">
                    <form action="" onsubmit="clearFormatCNPJ()" >
                        <h3 class="mb-4">Criar conta</h3>
                        
                        <div class="row text-start">
                            <div class="col-6">
                                <label for="name" class="form-label fw-bold">Nome</label>
                                <input type="text" id="name" class="form-control mb-3"  placeholder="Nome e sobrenome" required autofocus>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="cpf" class="form-label fw-bold">CNPJ</label>
                                <input type="text" id="cnpjInput" class="form-control" oninput="cnpjMask()"> 
                                <div id="cpfHelp" class="form-text mb-3"></div>
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label fw-bold">E-mail</label>
                                <input type="email" id="email" class="form-control mb-3">
                            </div>

                            <div class="col-6 mb-2">
                                <label for="confirmEmail" class="form-label fw-bold">Confirme o E-mail</label>
                                <input type="email" id=confirmEmail class="form-control mb-3" >
                            </div>

                            <div class="col-6">
                                <label for="password" class="form-label fw-bold">Senha</label>
                                <input type="password" id="password" class="form-control mb-3">
                            </div>

                            <div class="col-6 mb-2">
                                <label for="confirmPassword" class="form-label fw-bold">Confirme sua senha</label>
                                <input type="password" id="confirmPassword" class="form-control mb-3" >
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                            <input type="submit" class="form-control btn btn-outline-primary mt-3" style="width:50%" value="Cadastrar">
                            </div>    
                        </div>
                    </form>
                    <hr>
                    <p class="text-muted mt-2 mb-1">Já tem um conta?<a href="/login" class="text-decoration-none"> Fazer login</a></p>   
                    
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script>
        function cnpjMask(){
            let valor = document.getElementById('cnpjInput').value;
            document.getElementById('cnpjInput').value = valor.replace(/\D/g,'')
                                                              .replace(/(\d{2})(\d)/,'$1.$2')
                                                              .replace(/(\d{3})(\d)/,'$1.$2')
                                                              .replace(/(\d{3})(\d)/,'$1/$2')
                                                              .replace(/(\d{4})(\d)/,'$1-$2')
                                                              .replace(/(-\d{2})\d+?$/, '$1');
        }

        function clearFormatCNPJ(){
            let valorOriginal = document.getElementById('cnpjInput').value;
            let regex = /\d/g;
            let valorFiltrado = valorOriginal.match(regex);
            document.getElementById('name').value = valorFiltrado.join("");
        }
    </script>
 </body>
 </html>