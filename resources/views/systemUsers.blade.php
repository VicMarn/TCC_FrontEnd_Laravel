@extends('layouts.layout1')

@section('title','Blastoiz | Usuários')

@section('content')
  <div class="row">
    @if(session('msg'))
      <p class="bg-success text-center text-light">{{session('msg')}}</p>
    @endif
  </div>
  <div class="container mt-4">
    <div class="d-flex align-items-end text-left">
      <img src="/img/user.svg" height="40" alt="Ícone inspeção">
      <h3 class="ms-2 mb-0">Usuários do sistema</h3>
    </div>
    <hr>
    <div class="my-2">
      <a data-bs-toggle="modal" data-bs-target="#sysUser_register" class="btn btn-primary mb-2">CADASTRAR USUÁRIO</a>
    </div>
    <!-- TABELA -->
    <div class="table-responsive">
      <table class="table">
        <thead class="table-primary">
          <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Id</th>
            <th scope="col">Nome</th>
            <th scope="col" class="text-center"></th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <!--Linha 1-->
          @foreach($sysUsers as $sysUser)
            <tr>
              <th scope="row" class="text-center">{{$loop->index + 1}}</th>
              <td class="text-center">{{$sysUser["id"]}}</td>
              <td >{{$sysUser["name"]}}</td>
              <td class="text-center">
                <div class="col">
                  <a data-bs-toggle="modal" data-bs-target='#viewUser-{{$sysUser["id"]}}' class="btn btn-success">VISUALIZAR</a>
                  <a data-bs-toggle="modal" data-bs-target='#editUser-{{$sysUser["id"]}}' class="btn btn-warning">EDITAR</a>
                  <form class="d-inline" action='user/{{$sysUser["id"]}}' method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">EXCLUIR</button>
                  </form>
                </div>
              </td>
            </tr>

            <!-- VISUALIZAR DADOS USUÁRIO -->
            <div class="modal fade" id='viewUser-{{$sysUser["id"]}}' tabindex="-1" aria-labelledby="visualizar" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">VISUALIZAR USUÁRIO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Nome usuário</label>
                      <input type="text" class="form-control" value='{{$sysUser["name"]}}' disabled>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" value='{{$sysUser["email"]}}' disabled>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">CPF/CNPJ</label>
                      <input type="text" class="form-control" value='{{$sysUser["cpf_cnpj"]}}' disabled>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Função</label>
                      <input type="text" class="form-control" value='{{$sysUser["role"]}}' disabled>
                    </div>
                    <!-- 
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Foto</label>
                      <input class="form-control" type="file" id="formFile" disabled>
                    </div>
                     -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
                    <!-- <button type="button" class="btn btn-primary">ATUALIZAR</button> -->
                  </div>
                </div>
              </div>
            </div>

            <!-- EDITAR DADOS USUÁRIO -->
            <div class="modal fade" id='editUser-{{$sysUser["id"]}}' tabindex="-1" aria-labelledby="atualizar" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDITAR USUÁRIO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action='user/{{$sysUser["id"]}}' method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                      <div class="mb-3">
                        <label class="form-label">Nome usuário</label>
                        <input type="text" name="name" class="form-control" value='{{$sysUser["name"]}}'>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value='{{$sysUser["email"]}}'>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">CPF/CNPJ</label>
                        <input type="text" name="cpf_cnpj" class="form-control" value='{{$sysUser["cpf_cnpj"]}}'>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Função</label>
                        <input type="text" name="role" class="form-control" value='{{$sysUser["role"]}}'>
                      </div>
                      <!--  
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="formFile">
                      </div>
                      -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
                      <button type="submit" class="btn btn-primary">ATUALIZAR</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  
  <!-- CADASTRAR CLIENTE -->
  <div class="modal fade" id="sysUser_register" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CADASTRAR USUÁRIO</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="addUser" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Nome usuário</label>
              <input name="name" type="text" class="form-control" >
            </div>
            <div class="mb-3">
              <label class="form-label">Senha</label>
              <input name="password" type="password" class="form-control" >
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input name="email" type="email" class="form-control" >
            </div>
            <div class="mb-3">
              <label class="form-label">CPF/CNPJ</label>
              <input name="cpf_cnpj" type="text" class="form-control" >
            </div>
            <div class="mb-3">
              <label class="form-label">Função</label>
              <input name="role" type="text" class="form-control" >
            </div>
            <!--
            <div class="mb-3">
              <label for="formFile" class="form-label">Foto</label>
              <input class="form-control" type="file" id="formFile">
            </div>-->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
            <button type="submit" class="btn btn-primary">CADASTRAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection