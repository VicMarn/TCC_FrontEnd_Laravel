@extends('layouts.layout1')

@section('title','Blastoiz | Inspeções')

@section('content')

  <div class="container mt-4 rounded-4 shadow p-3">
    <div class="d-flex align-items-end text-left">
      <img src="/img/inpsectionIcon.svg" height="40" alt="Ícone inspeção">
      <h3 class="ms-2 mb-0">Inspeções</h3>
    </div>
    <hr>
    @if(session()->get('role') != 2)
      <div class="my-2">
        <a data-bs-toggle="modal" data-bs-target="#newInspModal" class="btn btn-primary mb-2">NOVA INSPEÇÃO</a>
      </div>
    @endif
    <!-- TABELA -->
    <div class="table-responsive">
      <table class="table">
        <thead class="table-primary">
          <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-start">Título</th>
            <th scope="col" class="text-center" style="white-space:nowrap">ID Cliente</th>
            <th scope="col" class="text-center">Data</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <!--Linha 1-->
          @foreach($inspections as $inspection)
            <tr>
              <th scope="row" class="text-center">{{$loop->index + 1}}</th>
              <td scope="row" class="text-start">{{$inspection["title"]}}</td>
              <td class="text-center">{{$inspection["customer_id"]}}</td>
              <td class="text-center">{{$inspection["start_date"]}}</td>
              <td class="text-center">
                <div class="col">
                  @if($inspection["is_finished"] == 0)
                    <a href='inspection/{{$inspection["id"]}}' class="btn btn-primary">INSPECIONAR</a>
                  @else
                    <a href='inspection/{{$inspection["id"]}}' class="btn btn-success">VISUALIZAR</a>
                  @endif
                  <!-- <a data-bs-toggle="modal" data-bs-target="#inspection_details" class="btn btn-success">VISUALIZAR</a> -->
                  @if(session()->get('role') != 2)
                    <button data-bs-toggle="modal" data-bs-target='#deleteInspection-{{$inspection["id"]}}' class="btn btn-danger">EXCLUIR</button>
                    <!-- <form action='inspection/{{$inspection["id"]}}' method="POST" class="d-inline"> 
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger">EXCLUIR</button>
                    </form>-->
                  @endif
                </div>
              </td>
            </tr>


            <!-- DELETAR INSPEÇÃO -->
            <div class="modal fade" id='deleteInspection-{{$inspection["id"]}}' tabindex="-1" aria-labelledby="deletar" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que quer excluir esta inspeção?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  
                  <p class="text-muted text-center mt-2">Id: <b>{{$inspection["id"]}}</b><br>Título: <b>{{$inspection["title"]}}</b></p>
                  <form action='inspection/{{$inspection["id"]}}' method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
                      <button type="submit" class="btn btn-danger">EXCLUIR</button>
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

  <!-- CADASTRAR INSPEÇÃO -->
  <div class="modal fade" id="newInspModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">NOVA INSPEÇÃO</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="addInspection" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Cliente inspecionado</label>
              <select class=form-select name="customer">
                <option name="customer" value="">Selecionar cliente</option>
                @foreach($inspCustomers as $inspCustomer)
                  <option name="customer" value='{{$inspCustomer["id"]}}'>{{$inspCustomer["name"]}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Título</label>
              <input name="title" type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Descrição</label>
              <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <!--  
            <div class="mb-3">
              <label class="form-label">Data de início</label>
              <input name="start_date" type="date" class="form-label">
            </div>
            
            <div class="mb-3">
              <label class="form-label">Data de finalização</label>
              <input name="end_date" type="date" class="form-label">
            </div>
            -->
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