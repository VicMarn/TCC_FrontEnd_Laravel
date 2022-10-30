@extends('layouts.layout1')

@section('title','Blastoiz | Clientes')

@section('content')
  <div class="row">
    @if(session('msg'))
      <p class="bg-success text-center text-light">{{session('msg')}}</p>
    @endif
  </div>
  <div class="container mt-4">
    <div class="d-flex align-items-end text-start">
      <img src="/img/clientes.svg" height="40" alt="Ícone Clientes">
      <h3 class="ms-2 mb-0">Clientes</h3>
    </div>
    <hr>
    <div class="my-2">
      <a data-bs-toggle="modal" data-bs-target="#customer_register" class="btn btn-primary mb-2">CADASTRAR CLIENTE</a>
    </div>
    <!-- TABELA -->
    <div class="table-responsive">
      <table class="table">
        <thead class="table-primary">
          <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" >Nome</th>
            <th scope="col" class="text-center">E-mail</th>
            <th scope="col" class="text-center">Telefone</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <!--Linha 1-->
          @foreach($customers as $customer)
            <tr>
              <th scope="row" class="text-center">{{$loop->index + 1}}</th>
              <td >{{$customer["name"]}}</td>
              <td class="text-center">{{$customer["email"]}}</td>
              <td class="text-center">{{$customer["phone"]}}</td>
              <td class="text-center">
                <div class="col">
                  <a data-bs-toggle="modal" data-bs-target='#viewCustomer-{{$customer["id"]}}' class="btn btn-success">VISUALIZAR</a>
                  <a data-bs-toggle="modal" data-bs-target='#editCustomer-{{$customer["id"]}}' class="btn btn-warning">EDITAR</a>
                  <form class="d-inline" action='customer/{{$customer["id"]}}' method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">EXCLUIR</button>
                  </form>
                  
                </div>
              </td>
            </tr>
            <!-- EDITAR DADOS CLIENTE -->
            <div class="modal fade" id='editCustomer-{{$customer["id"]}}' tabindex="-1" aria-labelledby="atualizar" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDITAR CLIENTE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action='customer/{{$customer["id"]}}' method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome cliente</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value='{{$customer["name"]}}'>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value='{{$customer["email"]}}'>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Telefone cliente</label>
                        <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" value='{{$customer["phone"]}}'>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Rede social/Site</label>
                        <input type="text" name="website" class="form-control" id="exampleFormControlInput1" value='{{$customer["website"]}}'>
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

            <!-- VISUALIZAR DADOS CLIENTE -->
            <div class="modal fade" id='viewCustomer-{{$customer["id"]}}' tabindex="-1" aria-labelledby="visualizar" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">VISUALIZAR CLIENTE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Nome cliente</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" value='{{$customer["name"]}}' disabled>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Email</label>
                      <input type="email" class="form-control" id="exampleFormControlInput1" value='{{$customer["email"]}}' disabled>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Telefone cliente</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" value='{{$customer["phone"]}}' disabled>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Rede social/Site</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" value='{{$customer["website"]}}' disabled>
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
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  


  <!-- CADASTRAR CLIENTE -->
  <div class="modal fade" id="customer_register" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CADASTRAR CLIENTE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="addCustomer" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nome cliente</label>
              <input name="name" type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Telefone cliente</label>
              <input name="phone" type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Rede social/Site</label>
              <input name="website" type="text" class="form-control" id="exampleFormControlInput1" >
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