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
                    @if(session('registerErrorMsg'))
                        <p class="bg-danger text-center text-light">{{session('registerErrorMsg')}}</p>
                    @endif
                    <form action="/register" method="POST" onsubmit="clearFormatCPF()">
                        @csrf
                        <h3 class="mb-4">Criar conta</h3>
                        <div class="row text-start">
                            <label for="cpfCnpjSelector" class="form-label fw-bold">Tipo de usuário:</label>
                            <select name="cpf_cnpj_selector" id="cpfCnpjSelector" class="rounded border mb-2" style="width:50%;" oninput="getUserType()" required>
                                <option value="">Selecione uma opção</option>
                                <option value="1">Pessoa física</option>
                                <option value="2">Pessoa jurídica</option>
                            </select>
                        </div>
                        <div class="row text-start">
                            <div class="col-6">
                                <label for="name" class="form-label fw-bold">Nome</label>
                                <input name="name" type="text" id="name" class="form-control mb-3"  placeholder="Nome e sobrenome" required>
                            </div>
                            <div class="col-6 mb-2"> 
                                <label id="cpfLabel" for="cpf" class="form-label fw-bold">CPF/CNPJ</label>
                                <input name="cpf_cnpj" type="text" id="cpfInput" class="form-control" oninput="cpfMask()" disabled required> 
                                <div id="cpfHelp" class="form-text mb-3"></div>
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label fw-bold">E-mail</label>
                                <input name="email" type="email" id="email" class="form-control mb-3" oninput="checkEmail()" required>
                            </div>
                            
                            <div class="col-6 mb-2">
                                <label for="confirmEmail" class="form-label fw-bold">Confirme o E-mail</label>
                                <input name="email_confirmation" type="email" id=confirmEmail class="form-control mb-3" oninput="checkEmail()">
                            </div>
                            
                            <div class="col-6">
                                <label for="password" class="form-label fw-bold">Senha</label>
                                <input name="password" type="password" id="password" class="form-control mb-3" oninput="checkPassword()" required>
                            </div>
                             
                            <div class="col-6 mb-2">
                                <label for="confirmPassword" class="form-label fw-bold">Confirme sua senha</label>
                                <input name="password_confirmation" type="password" id="confirmPassword" class="form-control mb-3" oninput="checkPassword()">
                            </div>

                            <div class="col-12 d-flex justify-content-center">
                            <input type="submit" id="submitButton" class="form-control btn btn-outline-primary mt-3" style="width:50%" value="Cadastrar">
                            </div>    
                        </div>
                    </form>
                    <hr>
                    <p class="text-muted mt-2 mb-1">Já tem um conta?<a href="/" class="text-decoration-none"> Fazer login</a></p>   
                    
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script>
        let userType = "";

        function getUserType(){
            document.getElementById('cpfInput').value = "";
            userType = document.getElementById('cpfCnpjSelector').value;
            
            if(userType == "1"){
                document = document.getElementById('cpfLabel').textContent = "CPF";
                document.getElementById('cpfInput').disabled = false;
            }
            else if(userType == "2"){
                document = document.getElementById('cpfLabel').textContent = "CNPJ";
                document.getElementById('cpfInput').disabled = false;
            }
            else{
                document = document.getElementById('cpfLabel').textContent = "CPF/CNPJ";
                document.getElementById('cpfInput').disabled = true;
            }
        }
        function cpfMask(){
            //let userType = document.getElementById('cpfCnpjSelector').value;
            if(userType == "1"){
                
                let valor = document.getElementById('cpfInput').value;
                document.getElementById('cpfInput').value = valor.replace(/\D/g,'')
                                                                .replace(/(\d{3})(\d)/, '$1.$2')
                                                                .replace(/(\d{3})(\d)/,'$1.$2')
                                                                .replace(/(\d{3})(\d{1,2})/,'$1-$2')
                                                                .replace(/(-\d{2})\d+?$/, '$1');

                
            }
            else if(userType == "2"){
                let valor = document.getElementById('cpfInput').value;
                document.getElementById('cpfInput').value = valor.replace(/\D/g,'')
                                                              .replace(/(\d{2})(\d)/,'$1.$2')
                                                              .replace(/(\d{3})(\d)/,'$1.$2')
                                                              .replace(/(\d{3})(\d)/,'$1/$2')
                                                              .replace(/(\d{4})(\d)/,'$1-$2')
                                                              .replace(/(-\d{2})\d+?$/, '$1');
            }
                                                            
        }

        function clearFormatCPF(){
            let valorOriginal = document.getElementById('cpfInput').value;
            let regex = /\d/g;
            let valorFiltrado = valorOriginal.match(regex);
            document.getElementById('cpfInput').value = valorFiltrado.join("");
        }

        function checkEmail(){
            let valorInput1 = document.getElementById('email').value;
            let valorInput2 = document.getElementById('confirmEmail').value;
            if(valorInput1 != valorInput2){
                document.getElementById('submitButton').disabled = true;
                document.getElementById('confirmEmail').classList.add("border-danger", "bg-danger", "bg-opacity-25");
            }
            else{
                document.getElementById('submitButton').disabled = false;
                document.getElementById('confirmEmail').classList.remove("border-danger", "bg-danger", "bg-opacity-25");
            }   
        }
        
        function checkPassword(){
            let valorInput1 = document.getElementById('password').value;
            let valorInput2 = document.getElementById('confirmPassword').value;
            if(valorInput1 != valorInput2){
                document.getElementById('submitButton').disabled = true;
                document.getElementById('confirmPassword').classList.add("border-danger", "bg-danger", "bg-opacity-25");
            }
            else{
                document.getElementById('submitButton').disabled = false;
                document.getElementById('confirmPassword').classList.remove("border-danger", "bg-danger", "bg-opacity-25");
            }   
        }
        
    </script>
 </body>
 </html>