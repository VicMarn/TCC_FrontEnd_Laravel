@extends('layouts.layout1')

@section('title','Blaztoiz | Inspeções')

@section('content')

  <div class="container mt-4">
    <div class="d-flex align-items-end text-left">
      <img src="/img/inpsectionIcon.svg" height="40" alt="Ícone inspeção">
      <h3 class="ms-2 mb-0">Inspeções</h3>
    </div>
    <hr>
    <div class="text-right my-2">
      <a href="newInspection" class="btn btn-primary mb-2">NOVA INSPEÇÃO</a>
    </div>

    <!-- TABELA -->
    <div class="table-responsive">
      <table class="table">
        <thead class="table-primary">
          <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">ID Inspetor</th>
            <th scope="col" class="text-center" style="white-space:nowrap">ID Cliente Inspecionado</th>
            <th scope="col" class="text-center">Data</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <!--Linha 1-->
          @foreach($inspections as $inspection)
            <tr>
              <th scope="row" class="text-center">{{$loop->index + 1}}</th>
              <td class="text-center">{{$inspection["user_id"]}}</td>
              <td class="text-center">{{$inspection["customer_id"]}}</td>
              <td class="text-center">{{$inspection["date"]}}</td>
              <td class="text-center">
                <div class="col">
                  <a data-bs-toggle="modal" data-bs-target="#inspection_details" class="btn btn-success">VISUALIZAR</a>
                  <a href="new_inspection" class="btn btn-warning">EDITAR</a>
                  <a href="new_inspection" class="btn btn-danger">EXCLUIR</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Visualizar inspeção -->
  <div class="modal fade" id="inspection_details" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">INSPEÇÃO 00X</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card mt-2">
            <div class="card-body">
              <h5 class="card-title">Informações Gerais</h5>
              <hr>
              <div class="mb-3">
                <label class="form-label">Cliente inspecionado</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Selecionar cliente</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Título da Inspeção</label>
                <input class="form-control" type="text">
              </div>
            </div>
          </div>

          <div class="card mt-2">
            <div class="card-body">
              <h5 class="card-title">Equipamentos</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Extintor do Hall</td>
                    <td>Co2</td>
                    <td>O extintor precisa ser trocado, pois ja pasosu da validade</td>
                    <td>APROVADO</td>
                    <td>
                      <div class="col">
                        <a href="" class="btn btn-success">VISUALIZAR</a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
          <button type="button" class="btn btn-primary">CADASTRAR</button>
        </div>
      </div>
    </div>
  </div>
@endsection