@extends('layouts.layout1')

@section('title', 'Blastoiz | Nova Inspeção')

@section('content')

    <div class="container mt-4">
        <div class="d-flex align-items-end text-start">
            <img src="/img/addInspection.svg" height="40" alt="Ícone nova inspeção">
            <h3 class="ms-2 mb-0">Nova Inspeção</h3>
        </div>
        <hr>
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
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Equipamentos</h5>
                    </div>
                    <div class="col">
                        <a href="" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#extinguisher_register">NOVO EQUIPAMENTO</a>
                    </div>
                </div>

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
                                    <a href="newInspection" class="btn btn-warning">EDITAR</a>
                                    <a href="newInspection" class="btn btn-danger">EXCLUIR</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h5 class="card-title">Finalização</h5>
                    </div>
                    <div class="col">
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#finish">FINALIZAR
                        INSPEÇÃO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE CADASTRO DE EXTINTOR -->
    <div class="modal fade" id="extinguisher_register" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CADASTRAR EXTINTOR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nome Extintor</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo Extintor</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Peso</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status do Equipamento</label>
                        <div class="row">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="approved">
                                    <label class="form-check-label" for="approved">
                                        Aprovado
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="rejected"
                                        checked>
                                    <label class="form-check-label" for="rejected">
                                        Reprovado
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input class="form-control" type="file">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
                    <button type="button" class="btn btn-primary">CADASTRAR</button>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL FINALIZAÇÃO DE INSPEÇÃO -->
    <div class="modal fade" id="finish" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CADASTRAR EXTINTOR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- SIGNATURE PAD AQUI DPS -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">VOLTAR</button>
                    <button type="button" class="btn btn-primary">FINALIZAR</button>
                </div>
            </div>
        </div>
    </div>
@endsection